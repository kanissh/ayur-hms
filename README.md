# Hospital management system for Ayurvedic hospital

This repository is archived

| !!!Temporary App home changed to point to certain pages!!! |
| ------ |
| App routing only added to Patient Registration page |
| Add routing to others also |
| Other components were are not imported (they are commented) to avoid compilation error |
| Import components before running locally |


# Getting Started - Local Frontend Development

## Installation

To get started locally, follow these instructions:

1. Install the latest LTS version of Node. See instructions [here](https://nodejs.org/en/download/).
1. Install npm. (This comes bundled with the Node.js installer. If not install npm seperately).
1. Install Angular CLI globally in your computer by running the following in your terminal:

	```shell
	npm install -g @angular/cli
	```
	(To learn more about Angular CLI commands see [here](https://angular.io/cli))
1. Clone this project to your local computer using `git`.
1. All the codes for the Angular project is in `ayur-hms/frontend/`. Navigate to `ayur-hms/frontend/` using your terminal and install all the needed dependencies locally by running:

	```shell
	npm install
	```

Now the Angular Frontend is setup and ready.

## Frontend Development

This project uses Material Design for UI design. Follow these instructions to setup Material design in Angular and to know about running the project locally:

1. Navigate to `ayur-hms/frontend/` using your terminal. Run:
	
	```shell
	ng add @angular/material
	```
	Accept all default choices. To learn more about getting started with Angular Material see [here](https://material.angular.io/guide/getting-started).
	
1. To test the project locally:

	```shell
	ng serve
	```
	The application will be served at [port 4200](http://localhost:4200/) by default.
	
To learn more about Angular project organization see the official [Angular documentation](https://angular.io/docs). View the catalog of Angular material components [here](https://angular.io/docs).
