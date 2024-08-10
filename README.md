# CodeIgniter 4 System Environment Check
This script is designed to help developers quickly assess their server environment's readiness for installing CodeIgniter 4. It checks the PHP version, required PHP extensions, and crucial configuration settings, presenting the results in a clean, user-friendly format. This tool is especially useful for pre-installation verification, ensuring that all necessary components are in place for a successful CodeIgniter 4 deployment.

## Features

- **PHP Version Check:** Ensures your server meets the minimum PHP version required by CodeIgniter 4 (PHP 7.4 or higher).
- **Required PHP Extensions Check:** Verifies that all necessary PHP extensions for CodeIgniter 4 are installed.
- **Optional PHP Extensions Check:** Lists additional extensions that can enhance performance or provide extra functionality.
- **Additional Environment Details:** Displays crucial PHP configuration details such as memory limits, file upload settings, and error logging.

## Installation

1. **Download the Script:**
   - Save the `index.php` file to your local machine.

2. **Upload the Script:**
   - Upload the `index.php` file to your web server, preferably in the root directory or a dedicated directory.

3. **Access the Script:**
   - Open your web browser and navigate to the script's URL. For example, if you uploaded the script to your root directory, access it via `http://yourdomain.com/index.php`.

## Usage

- Simply open the script in your browser.
- The script will automatically perform the system check and display the results in a user-friendly format.
- Review the output, especially the status of required PHP extensions and the PHP version.
- If any issues are found, follow the recommendations provided by the script to resolve them before installing CodeIgniter 4.

## Troubleshooting

- **PHP Version Too Low:** If the PHP version is below 7.4, you will need to upgrade your PHP version to meet the minimum requirements.
- **Missing PHP Extensions:** If any required PHP extensions are not installed, you will need to install them via your server's package manager or configure your PHP installation accordingly.
- **Configuration Issues:** Adjust PHP settings like memory limits, execution time, or file upload limits as recommended by the script.

## License

This script is open-source and can be freely modified and distributed. No warranty is provided, so use it at your own risk.

## Contributing

If you'd like to improve this script, feel free to fork the repository, make changes, and submit a pull request. Contributions are welcome!

## Support

If you encounter any issues or have questions about using this script, you can reach out via GitHub issues or the support channels of CodeIgniter's community.

---

**Note:** This script is intended for use before installing CodeIgniter 4 to ensure your server environment is properly configured. It does not perform the installation itself.
