#!/usr/bin/env python3
"""Fail if markdown YAML frontmatter is invalid or translation does not match a file."""

from __future__ import annotations

import re
import sys
from collections import Counter
from pathlib import Path

SKIP_DIRS = {".git", ".github", ".idea", "convert", "vendor", "node_modules", "scripts"}
SKIP_FILES = {"README.md", "CONTRIBUTING.md"}
LANGUAGES = {"en", "ru", "nl", "es"}
VERSION_PREFIXES = {"2.x", "3.x", "current"}
TRANSLATION_RE = re.compile(r"^translation:\s*(.*)$", re.M)


def frontmatter_block(text: str) -> str | None:
    if not text.startswith("---"):
        return None
    lines = text.splitlines()
    if not lines or lines[0].strip() != "---":
        return None
    end = None
    for index, line in enumerate(lines[1:], start=1):
        if line.strip() == "---":
            end = index
            break
    if end is None:
        return None
    return "\n".join(lines[1:end])


def duplicate_keys(block: str) -> list[tuple[str, int]]:
    keys: list[tuple[str, int]] = []
    for index, line in enumerate(block.splitlines(), start=2):
        stripped = line.strip()
        if not stripped or stripped.startswith("#"):
            continue
        if line.startswith(" ") or line.startswith("\t"):
            continue
        if ":" not in stripped:
            continue
        key = stripped.split(":", 1)[0].strip()
        if key:
            keys.append((key, index))

    counts = Counter(key for key, _ in keys)
    return [(key, line) for key, line in keys if counts[key] > 1]


def unquote(value: str) -> str:
    value = value.strip()
    if len(value) >= 2 and value[0] == value[-1] and value[0] in {"'", '"'}:
        return value[1:-1]
    return value


def infer_version_root(path: Path) -> Path | None:
    parts = path.parts
    for index, part in enumerate(parts):
        if index > 0 and part in LANGUAGES:
            return Path(*parts[:index]) if index > 0 else None
    return None


def normalize_translation_path(value: str) -> str | None:
    relative = value.strip().strip("/")
    if not relative:
        return None
    if relative.lower().endswith(".md"):
        relative = relative[:-3]
    segments = relative.split("/")
    if segments and segments[0] in VERSION_PREFIXES:
        segments = segments[1:]
    if segments and segments[0] == "en":
        segments = segments[1:]
    relative = "/".join(segments)
    return relative or None


def english_file_exists(version_root: Path, relative: str) -> bool:
    base = version_root / "en" / Path(relative)
    return Path(str(base) + ".md").is_file() or (base / "index.md").is_file()


def translation_errors(block: str, path: Path) -> list[str]:
    match = TRANSLATION_RE.search(block)
    if not match:
        return []

    value = unquote(match.group(1))
    errors: list[str] = []
    if value == "":
        return ["translation is empty"]

    if "\\" in value or " " in value or ".." in value:
        errors.append(f'translation "{value}" has an invalid path format')

    if value.startswith("/") or value.endswith("/"):
        errors.append(
            f'translation "{value}" must be a relative path without a leading or trailing slash'
        )

    if value.lower().endswith(".md"):
        errors.append(f'translation "{value}" must not include a .md extension')

    first = value.lstrip("/").split("/", 1)[0]
    if first in LANGUAGES or first in VERSION_PREFIXES:
        errors.append(f'translation "{value}" must not include a version or language prefix')

    relative = normalize_translation_path(value)
    version_root = infer_version_root(path)
    if relative and version_root and not english_file_exists(version_root, relative):
        errors.append(
            f'translation "{value}" does not match an English file '
            f"(expected en/{relative}.md or en/{relative}/index.md)"
        )

    return errors


def iter_markdown(root: Path):
    for path in root.rglob("*.md"):
        if any(part in SKIP_DIRS for part in path.parts):
            continue
        if path.name in SKIP_FILES:
            continue
        yield path


def main(argv: list[str]) -> int:
    if len(argv) < 2:
        print(
            "Usage: python3 .github/scripts/validate-frontmatter.py "
            "<docs-path> [<docs-path> ...]",
            file=sys.stderr,
        )
        return 1
    roots = [Path(arg) for arg in argv[1:]]
    errors = []
    files = 0

    for root in roots:
        if not root.is_dir():
            errors.append(f"{root}: Path is not a directory")
            continue
        for path in iter_markdown(root):
            files += 1
            block = frontmatter_block(path.read_text(encoding="utf-8"))
            if block is None:
                continue
            dups = duplicate_keys(block)
            seen = set()
            for key, line in dups:
                if key in seen:
                    continue
                seen.add(key)
                errors.append(f'{path}: Duplicate key "{key}" detected at line {line}')
            if dups:
                continue
            for message in translation_errors(block, path):
                errors.append(f"{path}: {message}")

    if errors:
        print("\n".join(errors), file=sys.stderr)
        print(f"Found {len(errors)} frontmatter issue(s) in {files} markdown files.", file=sys.stderr)
        return 1

    print(f"Frontmatter OK in {files} markdown files.")
    return 0


if __name__ == "__main__":
    raise SystemExit(main(sys.argv))
