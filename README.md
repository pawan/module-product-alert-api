# module-product-alert-api

## Description: 
We have define our API end point in `etc/webapi.xml` file. For Add product we have `/V1/productalertstock/add/:productId` and for delete `/V1/productalertstock/delete/:productId`. The complete URL will be `http://{Magento2Root}/rest/V1/productalertstock/add/123`

For Accessing above API You need Customer token, which can be retrieved by `http://{Magento2Root}/rest/V1/integration/customer/token`

### Where:

* 123 is the product ID
* `{Magento2Root}` is root folder/Url of magento 2
