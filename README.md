# Fawry Payment Class

Fawry Payment Class is a PHP Class for Integrated Payment via Fawry Pay.

## Usage

```php
require_once 'Class/Fawry.php';

// Print SandBox JS for Fawry Payment
echo Fawry::jsSandBox();

// Print Live JS for Fawry Payment
echo Fawry::jsLive();

// Print Button Payment CheckOut
echo Fawry::payment();
```

## Example of Payment Method
```php
Fawry::payment('ar-eg', 'is0N+YQzlE4=', 23222, 'Ahmed Taher', '0123456789', 'ahmedtaherinfo0@gmail.com', 12, 'Order Description', 24, 1522, 'Order Number 12', 20.00, 1, '15inch', '25inch', '1.25kg', '1.25kg', 'success.php', 'fail.php', null);

```

## Payment method should have contain: 

- The language used by your customer. It should be 'ar-eg' or 'en-gb'.
- Merchant Code Your identifier on our Fawry system Ex: 'SHKKRxuqZ5Y='.
- Merchant Refer Number A unique identifier for the orders on your system Ex: 'OR-123456789'.
- Customer Name Ex: 'Ahmed Taher'.
- Customer Mobile Ex: '+20123456789'.
- Customer Email Ex: 'ahmedtaherinfo0@gmail.com'.
- Customer Profile Id Optional feature: The customer identifier id in your System Ex: '1253'.
- The order description which will be printed on POS receipt if the customer pay in Fawry channels Ex: 'Order Number 1 Description'.
- Expiry The merchant needs to set a specific expiry number of hours for the unpaid placed orders Ex: '24'.
- Product SKU The Order Items Product ID Ex: '152'.
- The Order Items Description Ex: 'PES2020 Game'.
- The Order Items Price like Decimal Format Ex: '100.00'.
- The Order Items Quantity Ex: '1'.
- The Order Items Width Ex: '10inch', can you set null.
- The Order Items Height Ex: '22inch', can you set null.
- The Order Items Length Ex: '25inch', can you set null.
- The Order Items Weight Ex: '1.25kg', can you set null.
- Success URL Upon completion of the Request Success Payment, you will be redirect to this URL.
- Failer URL Upon completion of the Request Failer Payment, you will be redirect to this URL.
- Secure Hash key Your Secure Hash key of Your Account in Fawry, can you set null.

## Response of Success Page will Show 
- Merchant Refer Number
- Fawry Refer Number
- Payment Method
- Signature

## Response of Failer Page will Show
- Merchant Refer Number


## Contributing
For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[GNU General Public License](http://www.gnu.org/licenses/old-licenses/gpl-1.0.html)