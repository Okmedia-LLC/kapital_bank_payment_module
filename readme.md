# Kapital Bank OpenCart Payment Module

## Overview
The Kapital Bank OpenCart Payment Module is a custom add-on designed specifically for integrating Kapital Bank's payment gateway with the OpenCart e-commerce platform. This module allows administrators to securely process payments through Kapital Bank, providing a seamless and reliable payment experience for customers.

## Features
- **Secure Payment Processing:** Easily integrate Kapital Bank's payment gateway with your OpenCart store.
- **Admin Interface:** User-friendly interface integrated within the OpenCart admin panel for managing payment settings.
- **Compatibility:** Designed to work seamlessly with OpenCart 4.x and higher versions.
- **Multi-Language Support:** Includes English language files, allowing for easy localization.

## MVC Architecture
The Kapital Bank OpenCart Payment Module is developed using the MVC (Model-View-Controller) architecture, which organizes the codebase into three interconnected components:

- **Model:** Manages the data logic, handling the retrieval and manipulation of payment-related data.
- **View:** Handles the user interface, ensuring that the payment options are presented correctly in the OpenCart admin panel and on the storefront.
- **Controller:** Facilitates the interaction between the Model and View, processing user inputs and updating the Model and View as necessary.

This architecture ensures a clean separation of concerns, making the module easier to maintain, extend, and test.

## Installation

1. **Upload the Module:**
   - Upload the `kapital_bank.ocmod.zip` file via the OpenCart Extension Installer.
   - Go to `Extensions > Modifications` and click on the `Refresh` button to apply the changes.

2. **Enable the Module:**
   - Navigate to `Extensions > Extensions > Payments`.
   - Find the `Kapital Bank` module in the list and click `Install`.
   - Once installed, click `Edit` to configure the module settings.

## Usage

1. **Activate the Module:**
   - After installing the module, go to `Extensions > Extensions > Payments`.
   - Find the `Kapital Bank` module and click `Install`.
   - Once installed, click `Edit` to configure the module settings, including API credentials, payment options, and transaction settings.

2. **Process Payments:**
   - The module will handle payments through Kapital Bank's gateway, allowing customers to complete transactions securely on your OpenCart store.

## Requirements
- OpenCart Version 4.x or higher
- PHP 7.1 or higher
- Kapital Bank API credentials

## Uninstallation
To remove the module, navigate to `Extensions > Extensions > Payments`, find `Kapital Bank`, and click `Uninstall`. This will remove the module and all associated data from your OpenCart store.

## License
This module is proprietary and is intended for internal use within the company. Redistribution or use outside the company is prohibited.

## Author
**Ehmedli Ehmed** - Okmedia MMC
