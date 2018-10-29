# nHub Code Challenge: nHub Developer Community


## PROJECT TITLE: TERMINUS.NG

## How it Works # One
### Get Started 

  - Enter your WhatsApp number to get started.

  - A member of the Terminus.ng team starts a conversation with you to figure out the exact details of your request. Then you are put in a group chat with 3-8 retailers based on your product request.
  
### Haggling & Payment
While we moderate this group product request chat, you can change specifications and add more item requests while sellers send you images and product details within the chat.

Haggling begins for best possible price. Once the details and price have been confirmed, we send you an invoice and a link through which you can pay directly on chat.

### Results
We get the job done, keeping you in the loop at every step of the process. We also send you photo confirmations as well as receipts within this chat stream as delivery moves to you.


## How it Works # Two (Code Challenge)
#### Introduction
There are many cases/instances where one can be so busy to the extend of not having time to go to the super market/mall to do shopping like regular individuals. Going through rows of shelves trying to pick out items in a super market or shopping mall can be overwhelming sometimes and time consuming especially when you are on a tight schedule.

Terminus.ng bridges the gab and ease the stress and brings us to the question HOW?.

Very simple.... Just pick up your phone (probably enroute to the store), dial the short code ```*384*25851#``` from your mobile phone. Follow the prompts, select a store and place your order. The super market or shopping mall logs into the terminus.ng dashboard and sees the order request, assigns a staff to collect all the items on the order list, Buyers get notified via SMS that their purchase order is ready for pick up. Buyer picks up his/her order, confirm all is as ordered, make payment for the said items, head back home within minutes not hours.


# Setting up the Project
  - Clone the project by running ```git clone https://github.com/nanichang/nHubCodeChallenge.git```
  - ```cd nHubCodeChallenge```
  - ```composer install```
  - create a .env file by running ```touch .env``` or copy .env.example using ```cp .env.example .env```, fill in the required parameters
  - Generate an app key by running ```php artisan key:generate```
  - migrate the database tables with ```php artisan migrate```
  - Seed the database tables with demo data for testing```php artisan db:seed```
  - Launch the project with ```php artisan serve```
  - Open project on your browser at ```localhost:8000``` or ```127.0.0.1:8000```
  - Go to ```/auth/login``` access the admin portal.
  - username: ```user@terminus.ng```, password: ```secret```

### Note
  In order to test USSD locally, you will need to expose your local machine to the public domain. ```ngrok``` is a great tool for that.