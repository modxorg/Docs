---
title: "Таблица очереди писем"
translation: "extending-modx/creating-components/letter-queue-table/"
---

На этом уроке мы закрепляем работу с ExtJS. Здесь не будет ничего нового, мы рисуем очередную таблицу и задаём для неё процессоры.

Логика работы такая:

* У нас есть рассылка
* К ней прикреплены подписчики
* Нужно взять рассылку, сгенерировать письмо и поставить в очередь
* Один подписчик — одно письмо для каждой рассылки
* После создания письма его можно удалить или отправить

В итоге у меня получилась вот такая таблица:

![](etter-queue-table-1.png)

## Корректировки

Для начала нужно внести кое-какие изменения, которые я пропустил на прошлых уроках.

Улучшаем процессоры создания и обновления рассылок. Теперь мы требуем **или** шаблон **или** сниппет.

``` php
if (!$this->getProperty('template') && !$this->getProperty('snippet')) {
    $this->addFieldError('template', $this->modx->lexicon('sendex_newsletter_err_template'));
    $this->addFieldError('snippet', $this->modx->lexicon('sendex_newsletter_err_snippet'));
}
````

И меняем проверку поля **active** — при обновлении подписки там отправляется строка «false», нужно проверять и её:

``` php
$this->setProperty('active', !empty($active) && $active != 'false');
```

Добавляем возможность удаления сниппета и шаблона из рассылки. Нужно просто включить параметр **editable** в комбобоксах `widgets/newsletters.grid.js`:

``` javascript
{xtype: 'modx-combo-template',editable:true,fieldLabel: _('sendex_newsletter_template'),name: 'template',id: 'sendex-'+this.ident+'-template',anchor: '99%'}
// ...
{xtype: 'sendex-combo-snippet',editable:true,fieldLabel: _('sendex_newsletter_snippet'),name: 'snippet',id: 'sendex-'+this.ident+'-snippet',anchor: '99%'}
```

Вот [коммит с изменениями](https://github.com/bezumkin/Sendex/commit/2ece7a59af8a22df3ebb1d60dffcd08d3c708715).

## Меняем модель sxQueue

Нам нужно добавить защиту от дублирования писем. Для этого будем использовать новый столбец **hash** в объекте `sxQueue`.

Меняем `sendex.mysql.schema.xml`:

``` xml
<field key="hash" dbtype="char" precision="40" phptype="string" null="true" default="" />

<index alias="newsletter_id" name="newsletter_id" primary="false" unique="false" type="BTREE">
    <column key="newsletter_id" length="" collation="A" null="false" />
</index>
<index alias="subscriber_id" name="user_id" primary="false" unique="false" type="BTREE">
    <column key="subscriber_id" length="" collation="A" null="false" />
</index>
<index alias="timestamp" name="timestamp" primary="false" unique="false" type="BTREE">
    <column key="timestamp" length="" collation="A" null="false" />
</index>
<index alias="hash" name="hash" primary="false" unique="true" type="BTREE">
    <column key="hash" length="" collation="A" null="false" />
</index>
```

Добавляем новое поле и уникальный индекс для него. Заодно исправляем старую опечатку — меняем user_id на subscriber_id.

Теперь нужно запрограммировать изменение таблицы при установке и обновлении пакета. Для этого редактируем скрипт ресолвера tables:

``` php
// Запоминаем текущий уровень ошибок
$level = $modx->getLogLevel();
// Выставляем самый мощный уровень, чтобы не было ругани в логах при попытке создания существующих полей
$modx->setLogLevel(xPDO::LOG_LEVEL_FATAL);

// Добавляем поле и индекс
$manager->addField('sxQueue', 'hash');
$manager->addIndex('sxQueue', 'hash');

// Возвращаем старый уровень логирования
$modx->setLogLevel($level);
```

При установке пакета будет изменена таблица в БД.
Переустанавливаем пакет, чтобы применить изменения, запуская
[build.transport.php](http://c2263.paas2.ams.modxcloud.com/Sendex/_build/build.transport.php) из браузера.

Вот [коммит с изменениями](https://github.com/bezumkin/Sendex/commit/2a8e11337420f8063727b15b7f05dc1278305906).

## Таблица очереди писем

Здесь всё как обычно, простая таблица ExtJS.

Создаём новый файл `/assets/components/sendex/js/mgr/widgets/queues.grid.js` и пишем там:

``` javascript
Sendex.grid.Queues = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'sendex-grid-queues'
        ,url: Sendex.config.connector_url
        ,baseParams: {
            action: 'mgr/queue/getlist'
        }
        ,fields: ['id','newsletter_id','subscriber_id','timestamp','email_to','email_subject','email_body','email_from','email_from_name','email_reply','newsletter']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [
            {header: _('sendex_queue_id'),dataIndex: 'id',width: 50}
            ,{header: _('sendex_newsletter'),dataIndex: 'newsletter',width: 100}
            ,{header: _('sendex_queue_email_to'),dataIndex: 'email_to',width: 75}
            //,{header: _('sendex_queue_email_body'),dataIndex: 'email_body',width: 100}
            ,{header: _('sendex_queue_email_subject'),dataIndex: 'email_subject',width: 100}
            //,{header: _('sendex_queue_email_from_name'),dataIndex: 'email_from_name',width: 100}
            //,{header: _('sendex_queue_email_reply'),dataIndex: 'email_reply',width: 100}
            ,{header: _('sendex_queue_email_from'),dataIndex: 'email_from',width: 100}
            ,{header: _('sendex_queue_timestamp'),dataIndex: 'timestamp',width: 75}
        ]
    });
    Sendex.grid.Queues.superclass.constructor.call(this,config);
};
Ext.extend(Sendex.grid.Queues,MODx.grid.Grid);
```

И добавляем его в контроллер для загрузки:

``` php
$this->addJavascript($this->Sendex->config['jsUrl'] . 'mgr/widgets/queues.grid.js');
```

Теперь можно вызвать новый xtype в `/assets/components/sendex/js/mgr/widgets/home.panel.js`:

``` javascript
{
    title: _('sendex_queues')
    ,items: [{
        html: _('sendex_queue_intro')
        ,border: false
        ,bodyCssClass: 'panel-desc'
        ,bodyStyle: 'margin-bottom: 10px'
    },{
        xtype: 'sendex-grid-queues'
        ,preventRender: true
    }]
}
```

[Коммит с изменением](https://github.com/bezumkin/Sendex/commit/9a1f704ba445d476ed8cb0616beab5271b1e59f8).

Для выборки данных из таблицы sxQueue нам нужен процессор `/core/components/sendex/processors/mgr/queue/getlist.class.php`. Из интересного в нём только присоединение таблицы рассылок, чтобы выводить имя в таблице:

``` php
public function prepareQueryBeforeCount(xPDOQuery $c) {
    $c->innerJoin('sxNewsletter', 'sxNewsletter', 'sxNewsletter.id = sxQueue.newsletter_id');
    $c->select($this->modx->getSelectColumns('sxQueue', 'sxQueue'));
    $c->select('sxNewsletter.name as newsletter');

    return $c;
}
```

Весь [процессор на GitHub](https://github.com/bezumkin/Sendex/commit/3beddd604d9855b523ee3a32eea1ad22c197b4e4).

## Добавление и отправка писем

Для добавления писем в очередь на отправку я предлагаю использовать специальный метод в объекте `sxNewsletter`. Будет удобно работать с ним не только из процессора, но и просто через `xPDO`.

Логика такая:

* Получаем объект рассылки
* Запускаем метод addQueues()
* Он получает всех подписчиков рассылки
* Смотрит в свойствах, sxNewsletter, кто генерирует письмо: шаблон или сниппет
* Запускает этот шаблон или сниппет и рендерит остатки.
* Добавляет письма для юзеров со свойствами рассылки и сгенерированным контентом

Вот [коммит с новым обновлённым объектом](https://github.com/bezumkin/Sendex/commit/6a6d237210cc76bd0d89eb056806acd3c07f1ec4) `sxNewsletter`.

Процессор, который будет запускать добавление писем рассылки выглядит так:

``` php
public function process() {
    // Получаем newsletter_id
    if (!$id = $this->getProperty('newsletter_id')) {
        return $this->failure($this->modx->lexicon('sendex_newsletter_err_ns'));
    }
    elseif (!$newsletter = $this->modx->getObject('sxNewsletter', $id)) {
        return $this->failure($this->modx->lexicon('sendex_newsletter_err_nf'));
    }

    /** @var sxNewsletter $newsletter */
    // Запускаем нужный метод
    $result = $newsletter->addQueues();
    // Если в ответ приходит не true - показываем ошибку
    if ($result !== true) {
        return $this->failure($result);
    }
    else {
        return $this->success();
    }
}
```

Весь [процессор на GitHub](https://github.com/bezumkin/Sendex/commit/e1f6b17ac9975cc9d0433a4c74beea53d1dd4657).

Теперь добавляем новые методы в объект `sxQueue`: **save** и **send**. `Save()` расширяет метод `xPDOObject()` и проверяет письмо на уникальность, через генерацию хеша и сравнение с имеющимися — вот зачем нам нужно было новое поле в БД.
А метод `send()` берет нужные параметры из БД и осуществляет отправку.

Вот коммит с обоими методами. Теперь при сохранении письма всегда будут проверяться на уникальность и отправлять их можно вызовом метода send().

Например:

```php
if ($queue = $modx->getObject('sxQueue', 12)) {
    $queue->send();
    $queue->remove();
}
```

## Элементы ExtJS

Для добавления писем в очередь нам нужно выбрать рассылку, для которой они будут сгенерированы. Самый логичный элемент для такого выбора — комбобокс.

Добавляем новый в `/assets/components/sendex/js/mgr/misc/sendex.combo.js`

``` javascript
Sendex.combo.Newsletter = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        name: 'user_id'
        ,fieldLabel: _('sendex_newsletter')
        ,hiddenName: config.name || 'user_id'
        ,displayField: 'name'
        ,valueField: 'id'
        ,anchor: '99%'
        ,fields: ['id','name']
        ,pageSize: 20
        ,url: Sendex.config.connector_url
        ,editable: true
        ,allowBlank: true
        ,emptyText: _('sendex_select_newsletter')
        ,baseParams: {
            action: 'mgr/newsletter/getlist'
            ,combo: 1
        }
        ,tpl: new Ext.XTemplate(''
            +'<tpl for="."><div class="sendex-list-item">'
            +'<span><small>({id})</small> {name}</span>'
            +'</div></tpl>',{
            compiled: true
        })
        ,itemSelector: 'div.sendex-list-item'
    });
    Sendex.combo.Newsletter.superclass.constructor.call(this,config);
};
Ext.extend(Sendex.combo.Newsletter,MODx.combo.ComboBox);
Ext.reg('sendex-combo-newsletter',Sendex.combo.Newsletter);
```

Мы обращаемся к уже существующему процессору `newsletter/getlist`, который будет проверять параметр combo, и если он не пуст — добавлять кое-какие условия:

``` php
public function prepareQueryBeforeCount(xPDOQuery $c) {
    if ($query = $this->getProperty('query')) {
        $c->where(array(
            'name:LIKE' => "%$query%",
            'OR:description:LIKE' => "%$query%"
        ));
    }
    if ($this->getProperty('combo')) {
        $c->where(array('active' => 1));
    }
    return $c;
}
```

То есть, выбираем только активные рассылки, и поддерживаем поиск по имени и описанию. [Коммит с этими изменениями](https://github.com/bezumkin/Sendex/commit/d48bdee9ce5d2bd7c73d145634f67dcedd8e52f1).

Получается вот так:

![](etter-queue-table-2.png)

При выборе строки в комбобоксе запускается метод `createQueues()` таблицы:

``` javascript
,createQueues: function(combo, newsletter, e) {
    combo.reset();

    MODx.Ajax.request({
        url: Sendex.config.connector_url
        ,params: {
            action: 'mgr/queue/add'
            ,newsletter_id: newsletter.id
        }
        ,listeners: {
            success: {fn:function® {this.refresh();},scope:this}
        }
    });
}
```

А тот запускает процессор `queue/add` и обновляет таблицу. В общем, ничего нового, вы всё это уже знаете и видели на предыдущих уроках.

Добавляем контекстное меню:

``` javascript
,getMenu: function() {
    var m = [];

    m.push({
        text: _('sendex_queue_send')
        ,handler: this.sendQueue
    });
    m.push('-');
    m.push({
        text: _('sendex_queue_remove')
        ,handler: this.removeQueue
    });
    this.addContextMenuItem(m);
}
И методы для него:
,sendQueue: function(btn,e,row) {
    if (!this.menu.record) return;

    MODx.Ajax.request({
        url: Sendex.config.connector_url
        ,params: {
            action: 'mgr/queue/send'
            ,id: this.menu.record.id
        }
        ,listeners: {
            success: {fn:function® {this.refresh();},scope:this}
        }
    });
}

,removeQueue: function(btn,e,row) {
    if (!this.menu.record) return;

    MODx.msg.confirm({
        title: _('sendex_queue_remove')
        ,text: _('sendex_queue_remove_confirm')
        ,url: Sendex.config.connector_url
        ,params: {
            action: 'mgr/queue/remove'
            ,id: this.menu.record.id
        }
        ,listeners: {
            success: {fn:function® {this.refresh();},scope:this}
        }
    });
}
```

Затем нужно добавить процессоры, к которым обращаются эти методы, и недостающие записи лексикона.
Вот [итоговый коммит](https://github.com/bezumkin/Sendex/commit/438f3184fcb5e14bcd0ae32fae080500e143708b) со всеми оставшимися изменениями.

## Заключение

Вот мы и сделали таблицу с очередью писем.

Мы можем самостоятельно добавлять рассылки, прикреплять к ним юзеров, генерировать и отправлять письма. Пока что, всё это вручную, но автоматизировать имеющийся функционал будет несложно.

Нам осталось написать сниппеты для подписки и отписки пользователей на сайте. Ну и добавить отправку писем по расписанию в cron.

После этого, на мой взгляд, первая версия компонента Sendex будет готова, и его можно будет выпускать для бета-тестирования.
