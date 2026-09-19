# 20i Modules for WHMCS

## Introduction

These are modules to provide access to 20i from WHMCS.
For help with installation, please see https://www.20i.com/support/reseller-hosting/install-setup-WHMCS

## System Requirements

+ PHP 5.6 or later
+ WHMCS 7.1 or later

## Manual Installation

Run the following commands, replacing `<your whmcs directory>` with the path to
your WHMCS directory, something like `/var/www/whmcs`. Please note that you
should be careful when copying and pasting to exclude spaces as that changes the
meaning of these commands.

If you already have the module installed, you will need to move the include
directory out of the way:

```
mv <your whmcs directory>/20i <your whmcs directory>/20i~
```

Then you can copy the new files over:

```
cp -r 20i <your whmcs directory>/
cp -rf modules <your whmcs directory>/
```

If you moved the old include directory out of the way, you should now remove it:

```
rm -rI <your whmcs directory>/20i~
```

## Manual Installation (Cleanup)

If you have accidentally copied other files into your WHMCS directory, you
should remove them. You can do this by running:

```
rm <your whmcs directory>/{LICENSE,README.md}
```

## Configuration

These instructions are subject to change as the WHMCS user interface is updated. Please refer to your WHMCS documentation if you can't find something mentioned here.

1. Set up a field to store stack user details. This should be in `Setup`->`Custom Client Fields`. You can pick a name, select 'text box' and enable 'Admin only'.

2. Add a server bound to the 20i provisioning module, this should be `Setup`->`Products/Services`->`Servers`. Put your combined API key in the password field. If you don't have a combined API key yet, you can get it from https://my.20i.com/reseller/api. Leave the username blank.

3. Add some hosting products. This is in `Setup`->`Products/Services`->`Products/Services`. On the new product(s), you'll need to go to `Module Settings`, select the 20i module, and fill in the configuration there. You also need to go into `Custom Fields` and add a field "packageId" which is admin-only.

4. Activate the domain module. This is in `Setup`->`Products/Services`->`Domain Registrars`. Put your combined API key in the password field, and fill in the other fields as you would for hosting products.

5. (Optional) Use 20i for domain lookup. This is in `Setup`->`Products/Services`->`Domain Pricing`. If you click "Change" in "Lookup Provider", you can select the 20i service.

## Products

### .uk Domains

Since WHMCS does not support 0-year transfers, for TLDs which have this
behaviour, like *.uk*, you must set a price of 0.00 for 1-year transfers and
disable (-1) all other transfer year options. Any 1-year transfer orders for a
price of 0.00 will be automatically corrected to 0-year.

### Domain Privacy (ID protection)

For .UK domains this will do nothing by default, in case you already have a product set up for the free individuals-only "WHOIS opt-out" service. Once you have a chargeable product set up for this, you can enable it by ticking `Enable paid privacy service for .UK` in `Setup`->`Products/Services`->`Domain Registrars`.

## Advanced Topics

### Importing Services

Under some circumstances you may want to set up a service as if it had been
purchased via 20i on your WHMCS install. This may include cases where you've
migrated services from another WHMCS provider.

Manual method:

1. Log in to my.20i.com
2. Go to Manage Hosting
3. Click Options->Edit on the package you're looking for
4. Copy the ID number from the header
5. Go to the Product/Service in WHMCS Admin
6. Paste the ID number into the "packageId" field near the bottom

Autodetect method:

1. Go to the Product/Service in WHMCS Admin
2. In the "packageId" field near the bottom, type an asterisk "*"

Autodetect only works when you have a package with a name which exactly matches
the domain name in WHMCS. The behaviour is undefined if you delete and recreate
a package, or move a domain name between packages.

### Importing Stack Users

If you've set up Stack users, you may want to copy them over so that your
customer can access all their services from within Stack without having to go
back to your WHMCS site. This is only applicable to existing unlinked Stack
users, as new Stack users are set up automatically whenever a new order is
placed in WHMCS.

Please note that imported users will not have their access changed, so you may
also want to review which services they have access to.

Manual method:

1. Log in to my.20i.com
2. Go to StackCP Users
3. Click Options->Edit on the user you're looking for
4. Copy the user reference from the header (something like "stack-user:42")
5. Go to the appropriate Client in WHMCS admin
6. Select Profile
7. Paste the user reference into your Stack user field near the bottom

Autodetect method:

1. Go to the appropriate Client in WHMCS admin
2. Select Profile
3. In your Stack user field (towards the bottom of the page), type an asterisk "*"

If you use autodetect, you should be aware that this may connect a Stack user
which you didn't intend to allow access to. Autodetect only works when the WHMCS
user email address exactly matches one of your stack user email addresses.
