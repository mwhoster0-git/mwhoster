Release Notes
=============

1.0.6
-----

- Added an endpoint for domain suggestions

1.0.5
-----

- IMPORTANT NOTE: If you have a price for "1-year" .uk transfers, it will now be
  taken that you want a 1-year renewal on transfer.
- Updated registration/transfer for non-UK domains with non-organisation
  registrants to the new required basket format
- Added support for 1+ year .uk transfers via implicit renewal
- Added automatic assignment of stack user access when `packageId=*`
- Added support for upgrade/downgrade of hosting
- Added support for domain privacy, see README.md

1.0.4
-----

- Reduced the chance of single-sign-on errors

1.0.3
-----

- Added support for explicit admin, billing, tech contacts on registration and transfer
- Added support for custom nameservers on registration and transfer

1.0.2
-----

- Added autodetect for importing hosting
- Added autodetect for importing Stack users
- Simplified domain module configuration to use the combined API key (as with provisioning module).
- Improved module logging output
- Added a workaround for WHMCS' lack of 0-year transfer support, see README.md
- Improved handling of the UK WHOIS opt-out flag

1.0.1
-----

- Added single-sign-on for domain names

1.0.0
-----

- Initial release
