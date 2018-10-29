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
Dial ```*384*25851#``` from your mobile phone. Follow the prompts and place an order


# Setting up the Project
  - Clone the project by running ```git clone https://github.com/nanichang/nHubCodeChallenge.git```
  - ```cd nHubCodeChallenge```
  - ```composer install```
  - create a .env file by running ```touch .env``` or copy .env.example using ```cp .env.example .env```, fill in the required parameters
  - Generate an app key by running ```php artisan key:generate```
  - Launch the project with ```php artisan serve```
  - Open project on your browser at ```localhost:8000``` or ```127.0.0.1:8000```

### Note
  In order to test ussd locally, you will need to expose your local machine to the public domain. ```ngrok``` is a great tool for that.