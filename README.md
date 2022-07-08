#  For example- KEIC

# Kids Eat In Color

## Local Development Setup
The team will utilize Docker for local development to help streamline the process and reduce any environment-specific issues that may arise.
### Project Dependencies

* [PHP 7.4](http://php.net/manual/en/install.php)
* [Docker](https://www.docker.com/products/docker-desktop)
* [DDev](https://ddev.readthedocs.io/en/stable/#installation)
### Installing Docker
We are using DDev for local development.

You will need the following:
* [Docker](https://www.docker.com/products/docker-desktop)
* [DDev](https://ddev.readthedocs.io/en/stable/#installation)

After you have all of these you have to run ```ddev start``` to get your [local](https://keic-rebuild.ddev.site/) site working.
### Prerequisits

* Request a *professional email* email account
* Request access to Github repo i.e main repo where we push our code changes and raise pull requests
* Request access to pantheon/WP Engine instance from your Tech Lead
* Request access to JIRA board/Bug Heard from your Project manager
* Add your SSH key to github and pantheon instances

### Local Setup
Once you have the project dependencies setup on your local environment, you should be able to setup your local environment with the sites.
1. Clone the latest version of the main branch from GitHub.
    - `git clone https://github.com/Rajan1308/Evolving-Web.git`
    - Add your identity to github configuration by running the below commands
        - git config user.email "your-emailid@domainname.com"
        - git config user.name "Your Name"
2. Move into the project folder - `cd Evolving-Web`
3. Run ```ddev config``` and follow onscreen instructions and keep press enter, It will auto select everything.
4. Run ```ddev start```
   This will start your project and available at url https://evolving-web.ddev.site
   Note: If you see an error like port 80 is not able to listen, use below command and then run ddev start
   If any service other than apache is using port 80, kill that service and then run ddev start
   sudo service apache2 stop

Once you access the url, https://evolving-web.ddev.site first time, it will take you to intallation step, Just fill some details sitename, admin credentials. Once the site is ready, import the latest db and files from pantheon dev environment to your local to complete the setup.

# Working with storybook and components for local development

## Installation
Ensure you have Node version 15 installed

### NPM scripts
- `cd` into theme; run `npm install`
- Run `npm run storybook` to compile and run a local copy of storybook.

## Deployments

### Github Actions
* This project uses github actions for the deployments.

## Development Best Practices and workflow
### Start Clean
* Before you start to work on a new ticket, ensure you create a new branch from a recently updated main branch:
    * ```git fetch --all```
    * ```git checkout main```
    * ```git pull origin main```
    * ```git checkout -b <ticket_id>```
* Ensure you have no code changes left from previous development work. You can use Git Stash to keep changes for later use.
* Your branch name should match your ticket number, e.g. KEIC-100.
* Every ticket should have its own branch / PR.
* Once the development has been completed for your ticket, push the changes to github and create pull request in Github
    * ```git push origin <ticket_id>```
* Create pull request and select the base branch as: Main and Compare with your branch.
* Once your PR is merged by your LEAD, it will auto deploy into Pantheon dev environment. 

### DON'T work directly on Pantheon repo.

### Get Orientated and Understand
* Before you start to work on a new ticket, read the ticket carefully, including the testing steps.
* If there is something you don't understand, ask. Don't start working until you fully understand all aspects of it.
* If you need to, you can go to relevant pages, forms, settings pages, etc. if it helps you to understand the scope and context of the ticket.
### Think Ahead & Plan
* There are certain parts of the development work that may need to be done first. Others after that, based on what you did before. Plan this out: what will you do first, what will you do after that.
* Implementation details in a ticket are to provide you a possible direction/path for the ticket. They are meant to get you thinking about how an implementation could be done. They are by no means the way it HAS to be done. Please think about the requirements and if you have a better way to do this bring it up and start a discussion.
### Write Code that is Readable
* Your code should be easy to follow by anyone who does not necessarily know all the details of the task at hand: code reviewer, another dev in the team (now or in the future) that will build upon your work, etc.
* Suggestions to accomplish this:
    * Give names to variables, so that they exactly reflect what they contain: $blog_author_name is much clearer than $field_value.
    * In variable names that have more parts to it, start general and then become more specific:
        * $plan_details_original and $plan_details_updated is much better to organise than $original_plan_details and $updated_plan_details.
    * Add a line of comment everywhere you think a dev reading your code in the future may not understand what you are doing.
    * In foreach structure, use plural and singular version of a name: ```foreach ($offers_applied as $offer_applied) ```. The plural clearly refers to an array, a singular to an element of an array.
    * Improve your code quality bit by bit over time, understand and implement feedback that is given to you on PR reviews.
### Double and Triple Check Yourself
* Don't trust you do things right from the first shot. You are human and make errors. Please find those errors yourself before committing code and bother others to find those.
* Double check the code you write, double check settings you change, double check the steps you do to test your code.
* Triple check the code you write, triple check settings you change, triple check the steps you do to test your code.

