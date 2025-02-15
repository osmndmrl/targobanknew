<div class="alert alert-warning" role="alert">
   <strong><i>Note:</i></strong> The TARGOBANK plugin has been developed for use with the online store Ceres and only works with its structure or other template plugins. 
</div>

# TARGOBANK&nbsp;– Cashless payment in plentymarkets online stores

With the plentymarkets TARGOBANK plugin, incorporate **TARGOBANK**, **TARGOBANK PLUS** and **Installments Powered by TARGOBANK** in your online store.

## Opening a TARGOBANK account

You need to [open a business account with TARGOBANK](https://www.targobank.com/de/webapps/mpp/merchant) before you can set up the payment method in plentymarkets. You will then receive information and access data, which you will need for setting up the function in plentymarkets.

## Receiving access data from TARGOBANK

To use the TARGOBANK plugin, create an app for your online store with the [TARGOBANK Developer Interface](https://developer.targobank.com). In the app, you find access data for the live and sandbox environment which you <a href="#30."><strong>enter</strong></a> in the plentymarkets back end.

In **My Apps &amp; Credentials** in the dashboard, you find an overview of the interfaces. If there already is an app of the REST type&nbsp;– i.e. the online store&nbsp;–, it will be displayed here. With **Create App**, you can create a new target.

![View of the TARGOBANK dashboard](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/meta/images/sandbox_tutorial_1?raw=true)

Select the app (in this case **TARGOBANKPlugin**) to open an overview of the interface data. Make sure to <a href="#30."><strong>enter</strong></a> the live mode data for live access. Use the switch in the upper right corner to change between live and sandbox mode. Alternatively, you can use the sandbox data to test a normal checkout.

![View of the TARGOBANK dashboard](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/meta/images/sandbox_tutorial_2.png?raw=true)

## Setting up TARGOBANK in plentymarkets

Before using the full functionality of the plugin, you first have to connect your TARGOBANK account with your plentymarkets system.

##### Adding a TARGOBANK account:   
1. Go to **Settings&nbsp;» Orders&nbsp;» TARGOBANK&nbsp;» Account settings**. 2. Click on **Add TARGOBANK account**. 3. Enter an email address.<br />→ This address also serves as the name of the account. 4. Enter the client ID. 5. Enter the client secret. 6. Click on **Add**.<br /> → The TARGOBANK account will be added and displayed in the list.

Carry out further settings for the account.

##### Managing your TARGOBANK account:  
1. Go to **Settings&nbsp;» Orders&nbsp;» TARGOBANK&nbsp;» Account settings**. 2. Click on the TARGOBANK account you want to configure.<br /> → The TARGOBANK account will open. 3. Carry out the settings. Pay attention to the information given in table 1. 4. **Save** the settings.

<table>
<caption>Table 1: Carrying out the TARGOBANK account settings</caption>
	<thead>
		<th>
			Setting
		</th>
		<th>
			Explanation
		</th>
	</thead>
	<tbody>
		<tr>
			<td>
				<b>Client settings</b>
			</td>
			<td><a id="30." name="30."></a><b>Account</b> The email address serving as the account name.<br /> <b>Client ID:</b> Your TARGOBANK ID.<br /><b>Client secret:</b> Your TARGOBANK secret.<br /><strong><i>Note:</i></strong> This information cannot be changed.
			</td>
		</tr>
		<tr>
			<td>
				<b>Environment</b>
			</td>
			<td>			
Choose between <b>Test environment</b> and <b>Live environment</b>.<br /> <strong><i>Important:</i></strong> Since all information concerning accounts cannot be altered, two accounts are needed; one for the test environment, one for the live environment.<br /> <b>Test environment:</b> Provide test user and test data in the <strong><a href="https://developer.targobank.com/developer/accounts/" target="_blank">TARGOBANK Sandbox</a></strong>. The test environment is inaccessible for customers.<br /> <b>Live environment:</b> Switch to this environment to make the connected TARGOBANK account available for payments.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo URL</b>
			</td>
			<td>
			A HTTPS URL that leads to the logo. Valid file formats are .gif, .jpg or .png. The image may not exceed a maximum size of 190 pixels in width and 60 pixels in height. TARGOBANK cuts off images that are larger. TARGOBANK places the logo at the very top of the shopping cart overview.
			</td>
		</tr>
		<tr>
			<td>
				<b>Shopping cart border</b>
			</td>
			<td>
				The hexadecimal HTML code of the main colour of the shop. The colour fades to white in a frame around the shopping cart overview in the TARGOBANK checkout user interface.
			</td>
		</tr>
		<tr>
			<td>
				<b>Time of TARGOBANK payment collection</b>
			</td>
			<td>
				<strong>Sale (immediate debit):</strong> Collect payment immediately after the order has been completed.
			</td>
		</tr>
	</tbody>
</table>

## Managing payment methods

Discover how to offer the payment methods offered by TARGOBANK in your online store.

### Activating TARGOBANK PLUS

After installing the TARGOBANK plugin and connecting your account, TARGOBANK is automatically available as payment method. This payment method appears in the checkout among the other payment methods according to its priority.<br />Proceed as described below to activate TARGOBANK PLUS. The TARGOBANK PLUS Wall offers Germany's most used payment methods: TARGOBANK, Debit, Credit card as well as pay upon invoice&nbsp;– even without a TARGOBANK account. 

##### Activating TARGOBANK PLUS:

1. Go to **Settings&nbsp;» Orders&nbsp;» TARGOBANK&nbsp;» TARGOBANK PLUS**. 2. Select a Client (store). 3. Carry out the settings. Pay attention to the information given in table 2. 4. **Save** the settings.

<table>
<caption>Table 2: Configuring TARGOBANK PLUS</caption>
	<thead>
		<th>
			Setting
		</th>
		<th>
			Explanation
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">General</td>
		</tr>
		<tr>
			<td>
				<b>Active account</b>
			</td>
			<td>The TARGOBANK account for which the settings apply. Every client on the left has to be connected with an account. It is possible to use one account for several clients.</td>
		</tr>
		<tr>
			<td>
				<b>Priority</b>
			</td>
			<td>Determines the place of TARGOBANK in the checkout as long as TARGOBANK PLUS is not active.</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">TARGOBANK PLUS</td>
		</tr>
		<tr>
			<td>
				<b>Activate</b>
			</td>
			<td>
				Activate the TARGOBANK PLUS Wall in the checkout. <a href="#10."><strong>Connect</strong></a> at least one container to use the TARGOBANK PLUS Wall. 			
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Language settings</td>
		</tr>
		<tr>
			<td>
				<b>Language</b>
			</td>
			<td>
				Set up language packages for all the languages the shop is available in. TARGOBANK uses these packages when a customer changes the language of the online store.
			</td>
		</tr>
		<tr>
			<td>
				<b>Info page</b>
			</td>
			<td>
				Select a category page of the type <strong>content</strong> or enter the URL of a website to provide <strong><a href="https://www.plentymarkets.co.uk/manual/payment/managing-bank-details/#2-2">information about the payment method</a></strong>.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo</b>
			</td>
			<td>
			A HTTPS URL that leads to the logo. Valid file formats are .gif, .jpg or .png. The image may not exceed a maximum size of 190 pixels in width and 60 pixels in height. TARGOBANK cuts off images that are larger. TARGOBANK places the logo at the very top of the shopping cart overview.
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Additional settings</td>
		</tr>
		<tr>
			<td>
				<b>Countries of delivery</b>
			</td>
			<td>
				The TARGOBANK payment method is active only for the countries in this list.
			</td>
		</tr>
		<tr>
			<td>
				<b>Surcharges</b>
			</td>
			<td>
If the payment with TARGOBANK results in additional costs, enter the percentage value or flat rate value. The choice depends on the conditions of your contract.<strong>Domestic (surcharge):</strong> Enter a flat rate. The value that is entered will be taken into consideration for those orders that correspond to the system country. Once the customer has selected the payment method, these costs will be added to the particular order in the order process. The amount will be added to the total in the order and will not be displayed individually.<br />

Percentage <strong>Domestic (surcharge):</strong> Enter a percentage value. The value that is entered will be taken into consideration for those orders that correspond to the system country.<strong>Foreign countries (surcharge):</strong> Enter a flat rate. The value that is entered will be taken into consideration for those orders that correspond to a foreign country. Once the customer has selected the payment method, these costs will be added to the particular order in the order process. The amount will be added to the total in the order and will not be displayed individually.<br />

Percentage <strong>Foreign countries (surcharge)</strong>: Enter a percentage value. The value that is entered will be taken into consideration for those orders that correspond to a foreign country.<br />

<strong><i>Important:</i></strong> Do not enter a value into both fields (Percentage and Flat rate).
		</tr>
	</tbody>
</table>

### Activating Installments Powered by TARGOBANK

This menu is equal to the one for TARGOBANK PLUS, with the exception of the description of the activation button. If you already have carried out settings in the menu **TARGOBANK / TARGOBANK PLUS**, you can apply these here as well.

1. Go to **Settings&nbsp;» Orders&nbsp;» TARGOBANK&nbsp;» Installments Powered by TARGOBANK**. 2. Select a Client (store). 3. Carry out the settings. Pay attention to the information given in table 3. 4. **Save** the settings.

<div class="alert alert-warning" role="alert">
    <strong><i>Important:</i></strong> To use this payment method to its full extent and in accordance with legal requirements, you have to <a href="#10."><strong>link</strong></a> the containers <b>TARGOBANK Installment Prepare Button</b>, <b>TARGOBANK Installment Financing Check</b> and <b>TARGOBANK Installment Financing Costs</b>.<br /><br />In addition, Installments Powered by TARGOBANK is only available for German online stores of selected TARGOBANK Sellers after successful application. Apply <a href="https://www.targobank.com/de/webapps/mpp/installments"><strong>here</strong></a> for Installments Powered by TARGOBANK.
</div>

<table>
<caption>Table 3: Carrying out settings for Installments Powered by TARGOBANK</caption>
	<thead>
		<th>
			Setting
		</th>
		<th>
			Explanation
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">General</td>
		</tr>
		<tr>
			<td>
				<b>Active account</b>
			</td>
			<td>The TARGOBANK account for which the settings apply. Every client on the left has to be connected with an account. It is possible to use one account for several clients.</td>
		</tr>
		<tr>
			<td>
				<b>Priority</b>
			</td>
			<td>Determines the place of TARGOBANK in the checkout as long as TARGOBANK PLUS is not active.</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Specific Upstream Presentment</td>
		</tr>
		<tr>
			<td>
				<b>Activate</b>
			</td>
			<td>
				Background calculation of financing conditions. Depending on the linked containers, this could be, e.g., the purchase of the active item. If this box is unchecked, only the general possibility of paying in installments is advertised.			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Language settings</td>
		</tr>
		<tr>
			<td>
				<b>Language</b>
			</td>
			<td>
				Set up language packages for all the languages the shop is available in. TARGOBANK uses these packages when a customer changes the language of the online store.
			</td>
		</tr>
		<tr>
			<td>
				<b>Info page</b>
			</td>
			<td>
				Select a category page of the type <strong>content</strong> or enter the URL of a website to provide <strong><a href="https://www.plentymarkets.co.uk/manual/payment/managing-bank-details/#2-2">information about the payment method</a></strong>.
			</td>
		</tr>
		<tr>
			<td>
				<b>Logo</b>
			</td>
			<td>
				A HTTPS URL that leads to the logo. Valid file formats are .gif, .jpg or .png. The image may not exceed a maximum size of 190 pixels in width and 60 pixels in height. TARGOBANK cuts off images that are larger. TARGOBANK places the logo at the very top of the shopping cart overview.
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Additional settings</td>
		</tr>
		<tr>
			<td>
				<b>Countries of delivery</b>
			</td>
			<td>
				The TARGOBANK payment method is active only for the countries in this list.
			</td>
		</tr>
		<tr>
			<td>
				<b>Surcharges</b>
			</td>
			<td>
If the payment with TARGOBANK results in additional costs, enter the percentage value or flat rate value. The choice depends on the conditions of your contract.<strong>Domestic (surcharge):</strong> Enter a flat rate. The value that is entered will be taken into consideration for those orders that correspond to the system country. Once the customer has selected the payment method, these costs will be added to the particular order in the order process. The amount will be added to the total in the order and will not be displayed individually.<br />

Percentage <strong>Domestic (surcharge):</strong> Enter a percentage value. The value that is entered will be taken into consideration for those orders that correspond to the system country.<strong>Foreign countries (surcharge):</strong> Enter a flat rate. The value that is entered will be taken into consideration for those orders that correspond to a foreign country. Once the customer has selected the payment method, these costs will be added to the particular order in the order process. The amount will be added to the total in the order and will not be displayed individually.<br />

Percentage <strong>Foreign countries (surcharge)</strong>: Enter a percentage value. The value that is entered will be taken into consideration for those orders that correspond to a foreign country.<br />

<strong><i>Important:</i></strong> Do not enter a value into both fields (Percentage and Flat rate).
			</td>
		</tr>
	</tbody>
</table>

## Linking template containers

You have multiple options to integrate TARGOBANK PLUS, Installments Powered by TARGOBANK and the TARGOBANK Express Checkout button in your online store. For this purpose, the plentymarkets system offers containers at relevant places which can be filled with content to meet your needs.

##### Linking the TARGOBANK PLUS Wall:

1. Click on **Start&nbsp;» Plugins**. 2. Click on the **Content** tab. 3. Select the area TARGOBANK PLUS Wall. 4. Select one, several or all containers which shall use the TARGOBANK PLUS Wall. Pay attention to the information given in table 4.<br />→ The content is linked with the container.

<table>
<caption>Table 4: Linking containers</caption>
	<thead>
		<th>
			Link
		</th>
		<th>
			Explanation
		</th>
	</thead>
	<tbody>
		<tr>
		<td class="th" align=CENTER colspan="2">General</td>
		</tr>
		<tr>
        	<td>
        		<b>TARGOBANK scripts</b>
        	</td>
        	<td>The container Script loader: Register/load JS has to be linked to activate scripts.</td>
        		</tr>
		<tr>
			<td>
				<b>TARGOBANK Express Checkout button</b>
			</td>
			<td>Optional: Link the TARGOBANK Express Checkout button where it is needed, e.g. on the item page (Single item) or next to the shopping cart. In clicking this button, the customer can purchase the item or the content of the shopping cart at once, without going through the regular checkout. In this case, the customer will be forwarded to the TARGOBANK payment process. The shipping address is provided by TARGOBANK.</td>
		</tr>
		<tr>
		<tr>
		<td class="th" align=CENTER colspan="2">TARGOBANK PLUS</td>
		</tr>
		<tr>
			<td>
				<b>TARGOBANK PLUS Wall</b>
			</td>
			<td>
				A link with the container <strong>Checkout: Override payment method replaces all previous payment methods with the TARGOBANK PLUS Wall. A link with the container Checkout: Override payment method</strong> replaces all previous payment methods with the TARGOBANK PLUS Wall. Any payment methods offered in addition to those inside the Wall&nbsp;– TARGOBANK, Debit, Credit card and pay upon invoice&nbsp;– will be displayed below these four inside the wall in order of their priority. <a id="10." name="10."></a>
			</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2">Installments Powered by TARGOBANK</td>
		</tr>
		<tr>
		<td class="th" align=CENTER colspan="2"><strong><i>Important:</i></strong> To use this payment method to its full extent and in accordance with legal requirements, you have to link the containers <b>TARGOBANK Installment Prepare Button</b>, <b>TARGOBANK Installment Financing Check</b> and <b>TARGOBANK Installment Financing Costs</b>.
		</td>
		</tr>
		<tr>
		<td>
			<b>TARGOBANK Installment Prepare Button</b>
		</td>
			<td>
				A link with the container Checkout: Override "Order now" button</strong> replaces the <strong>Order now</strong> button with <strong>Apply for installments</strong> when a customer selects the payment method Installments Powered by TARGOBANK.
			</td>
			</tr>
			<tr>
			<td>
				<b>TARGOBANK Installment Financing Check</b>
			</td>
			<td>
After a click on <strong>Apply for installments</strong>, the customer is redirected to TARGOBANK's website to choose between qualifying financing options. After this, the customer is redirected to the shop. The seller has to inform about all details concerning the payment before the customer makes the order. Back in the shop, an overlay opens to display the total of the basket items and the financing costs. This overlay can only be exited by clicking on <strong>Cancel</strong> or <strong>Order now</strong>.<br />Clicking on <strong>Cancel</strong> leads back to the checkout, clicking on <strong>Order now</strong> irrevocably confirms the payment by installments. <br />The Financing Check has to be linked with one of the containers in the checkout, although not as an override, since this could overwrite critical content.<br />
			</td>
		</tr>
		<tr>
		<td>
				<b>TARGOBANK Installment Financing Check</b>
			</td>
			<td>
				According to legal requirements, all financing costs have to be displayed at the time of purchase. Ideal is a link with <strong>Order confirmation: Add content after totals, since the financing costs have to be displayed below the gross amount. Ideal is a link with Order confirmation: Add content after totals</strong>, since the financing costs have to be displayed below the gross amount. In addition, the financing costs are displayed on the customer invoice.
			</td>
			</tr>
			<tr>
			<td>
				<b>TARGOBANK Installment Generic Upstream Presentment</b>
			</td>
			<td>
				Optional: Advertises the general possibility of paying by Installments Powered by TARGOBANK. Link any containers in which Installments Powered by TARGOBANK should be mentioned.
			</td>
		</tr>
		<tr>
			<td>
				<b>TARGOBANK Installment Specific Upstream Presentment</b>
			</td>
			<td>
Optional: In contrast to the Generic Upstream Presentment, this container calculates qualifying financing options for the current item resp. the contents of the shopping cart. The most favourable option&nbsp;– depending on the total amount&nbsp;– takes precedence.
			</td>
		</tr>
	</tbody>
</table>

## Automatically refunding TARGOBANK payments

Set up an event procedure to automatically refund a TARGOBANK payment.

##### Setting up an event procedure:

1. Go to **Settings » Orders » Event procedures**. 2. Click on **Add event procedure**. → The **Create new event procedure** window will open. 3. Enter the name. 4. Select the event listed in table 4. 5. **Save** the settings. 6. Pay attention to the explanations given in table 4 and carry out the settings as desired. 7. Place a check mark next to the option **Active**. 8. **Save** the settings.

<table>
	<thead>
		<th>
			Setting
		</th>
		<th>
			Option
		</th>
<th>
			Selection
		</th>
	</thead>
	<tbody>
      <tr>
         <td><strong>Event</strong></td>
         <td><strong>Select the event to trigger a refund.</strong></td> 
<td></td>
      </tr>
      <tr>
         <td><strong>Filter 1</strong></td>
         <td><strong>Order &gt; Payment method</strong></td>
<td><strong>TARGOBANK</strong></td>
      </tr>
      <tr>
         <td><strong>Procedure</strong></td>
         <td><strong>Plugin &gt; Refunding a TARGOBANK payment</strong></td>
<td>&nbsp;</td>
      </tr>
</tbody>
	<caption>
		Table 4: Event procedure for automatically refunding TARGOBANK payments
	</caption>
</table>


## This project is licensed under the GNU AFFERO GENERAL PUBLIC LICENSE. – find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-payment-targobank/blob/master/LICENSE.md).
