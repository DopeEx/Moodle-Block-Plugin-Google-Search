### Moodle Block Plugin: Google Search

---

#### Description:
The Moodle Block Plugin named "Google Search" integrates Google Custom Search functionality directly into your Moodle platform. This plugin allows users to search the web using Google's search engine within the Moodle environment. Users can input their search queries and retrieve relevant search results conveniently.

---

#### Installation and Configuration:
1. **Installation**:
   - Copy the "googlesearch" folder into the "blocks" directory of your Moodle installation.
   - Ensure proper permissions for the copied files.

2. **Configuration**:
   - Navigate to your Moodle site as an administrator.
   - Access the Site Administration area.
   - Locate the Plugins tab and click on it.
   - Under Plugins, select Blocks.
   - Find the "Google Search" block and configure the required settings:
     - Google API Key: Obtain an API key from Google Developers Console.
     - Google Custom Search ID: Obtain a Custom Search Engine ID from the Google Custom Search control panel.

---

#### Functionality:
- **Block Initialization**:
  - The block initializes with the title "Google Search".

- **Block Content**:
  - The block provides a search form where users can input their search queries.
  - Upon submission, the plugin fetches search results from Google using the provided API key and Custom Search ID.
  - Search results, including titles and snippets, are displayed within the Moodle environment.

- **Error Handling**:
  - If API keys are not configured properly, appropriate error messages are displayed.
  - In case no search results are found, a relevant message is displayed to the users.

---

#### Usage:
- **Adding the Block**:
  - The Google Search block can be added to any page where blocks are supported within Moodle, such as the dashboard or course pages.

- **Searching**:
  - Users can input their search queries into the provided search form.
  - Upon submission, the plugin retrieves and displays relevant search results within the Moodle interface.

---

#### Note:
- This plugin operates by leveraging Google's Custom Search API.
- Ensure proper configuration of API keys and Custom Search ID for seamless functionality.

---

#### License:
This Moodle plugin is licensed under the GNU General Public License (GPL) version 3 or later. For more details, refer to the [GNU GPL v3 License](http://www.gnu.org/copyleft/gpl.html).

---

#### About the Author:
- **Author**: Alexander Schröter
- **Copyright**: 2024

