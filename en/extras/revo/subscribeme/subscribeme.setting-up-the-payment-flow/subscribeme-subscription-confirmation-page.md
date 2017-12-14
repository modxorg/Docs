---
title: "SubscribeMe - Subscription Confirmation Page"
_old_id: "726"
_old_uri: "revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-subscription-confirmation-page"
---

Once the user is finished with PayPal they will be returned the confirmation page setup in the [previous step](/extras/revo/subscribeme/subscribeme.setting-up-the-payment-flow/subscribeme-setting-up-the-payment-methods "SubscribeMe - Setting up the Payment Methods"). You should make sure the return\_id property points to this page.

Confirmation Page Code
----------------------

```
<pre class="brush: php">
<h3>Confirm Shipping Address</h3>
<p>The following data was retrieved from user profile, and updated based on your PayPal account. If your subscription includes shipping, <strong>make sure all details below are correct</strong>. Your details will then be updated on your user profile (PayPal will not be changed). </p>

[[!Formit?
  &preHooks=`smGetUserDataFromPayPal`
  &hooks=`smUpdateUserProfile,smCompletePayPalSubscription`
  &completedResource=`8`
  &errorResource=`7`
]]
<form action="[[~[[*id]]]]" method="post">
<input type="text" name="fullname" value="[[!+fi.fullname]]" /> Name<br />
<input type="text" name="address" value="[[!+fi.address]]" /> Address<br />
<input type="text" name="zip" value="[[!+fi.zip]]" /> Zip (Postcode)<br />
<input type="text" name="city" value="[[!+fi.city]]" /> City<br />
<input type="text" name="state" value="[[!+fi.state]]" /> State<br />
<input type="text" name="country" value="[[!+fi.country]]" /> Country<br />

<input type="hidden" name="token" value="[[!+fi.pp_token]]" />
<input type="hidden" name="PayerID" value="[[!+fi.pp_payerid]]" />

<p>By clicking the button below I confirm that my shipping details as stated above are correct. Furthermore I grant [[++site_name]] permission to create a recurring payments profile on PayPal which will automatically pay for the requested subscription. Bla, bla, bla, bla.</p>

<input type="submit" value="Subscribe!" />
</form>

```The users address and other information will be retrieved from PayPal using the preHook smGetUserDataFromPayPal, and saved to their user account. You should at the very least remove the "Bla, bla, bla, bla.", but if you get carried away, setting the completedResource and errorResource values in the formIt call would be a good idea.

<table><tbody><tr><th>Property   
</th><th>Description   
</th><th>Default   
</th></tr><tr><td>completedResource</td><td>Redirects the user to a thank you page   
</td><td> </td></tr><tr><td>errorResource</td><td>Redirects the user to an error page</td><td> </td></tr></tbody></table>Going Live
----------

You may want to make other adjustments to your website, such as offering a profile management section, but at this stage in the game you should have everything setup and working. If you need it, [how to go live](/extras/revo/subscribeme/subscribeme.configuring-api-credentials,-ipn-and-going-live "SubscribeMe.Configuring API Credentials, IPN and going Live") with SubscribeMe