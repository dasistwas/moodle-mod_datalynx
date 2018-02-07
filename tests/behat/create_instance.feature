@mod @mod_datalynx
Feature: In a datalynx instance create a new entry
  In order to create a new entry
  As a teacher
  I need to add a new entry to the datalynx instance.

  Background:
    Given the following "courses" exist:
      | fullname | shortname | category | groupmode |
      | Course 1 | C1        | 0        | 1         |
    And the following "users" exist:
      | username | firstname | lastname | email            |
      | teacher1 | Teacher   | 1        | teacher1@asd.com |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |
    And the following "activities" exist:
      | activity | course | idnumber | name                   |
      | datalynx | C1     | 12345    | Datalynx Test Instance |
    And "Datalynx Test Instance" has following fields:
      | type        | name     | param1                       | param3 |
      | text        | Text     |                              |        |
      | textarea    | Textarea |                              |        |
      | time        | Time     |                              |        |
      | duration    | Duration |                              |        |
      | radiobutton | Radio    | Option A, Option B, Option C | 3      |
      | checkbox    | Checkbox | Option 1, Option 2, Option 3 | 3      |
      | select      | Select   | Option X, Option Y, Option Z | 3      |
    And "Datalynx Test Instance" has following filters:
      | name       | perpage |
      | TestFilter | 3       |
    And "Datalynx Test Instance" has following views:
      | type    | name    | status  | redirect | filter     |
      | grid    | Grid    | default | Grid     | TestFilter |
      | tabular | Tabular | edit    | Grid     |            |
      | pdf     | PDF     | more    | Grid     |            |

  @javascript
  Scenario: add a new entry to dataylnx instance
    When I log in as "teacher1"
    And I am on "Course 1" course homepage
    And I follow "Datalynx Test Instance"
    And I follow "Add a new entry"
    Then I should see "Option 1"
    And I click option "Option A" from a radio
    And I click option "Option 2" from a checkbox
    And I select option "Option Z" from the "Select" select
    And I press "Save changes"
    And I press "Continue"
    And I edit "first" entry
    And I click option "Option B" from a radio
    And I click option "Option 1" from a checkbox
    And I select option "Option Y" from the "Select" select
    And I press "Save changes"
    And I press "Continue"
    Then I should see "Option B"
    And I should see "Option 1"
    And I should see "Option Y"
    But I should not see "Option 3"
