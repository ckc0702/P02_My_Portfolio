
## REACT SYNTAX ##
1. HTML inside jsx

2. useState(data) -> pass in data here, it will act similar to angular binding by returning a value and a function that allow to update the value. So that changes can be updated in view

3. create context & use context -> consist 3 basic step create context, providing the context, and consuming the context. Good to use for global data such as theming, user settings, authenticated user name etc.

4. useState vs useReducer -> useState mostly used when types of states are num, bool, and string. Where useReducer is for arrays, objects which can handle many state transitions

5. useRef -> ref={}, will set it to current property of useRef, useful for mutable value. It will persist for full lifetime of the component. Since usestate cannot persist useRef is useful if want persist situation. For instance, counter
##################################################################

## HTML SYNTAX ##
1. BEM (block, element, and modifier) -> a naming convention, double underscore or hyphen. This allow element more managable. before double mean the element that live inside the block and after hyphen denote the current element. In short easier to apply css

##################################################################

## LARAVEL SYNTAX ##
1. Authentication - built in authentication and session services (store athenticated user in session).
-> access via Auth and Session facades


##################################################################

## VERSIONS ##
(12/2/2022) 
1. Node JS      : v18.12.0 
2. React        : v18.2.0
3. Laravel      : v9.48.0
4. Php          : v8.0.2

##################################################################

## REACT DEPENDENCIES ##
1. npm i react-icons --save : ^4.7.1
2. npm i swiper --save : ^8.4.6
3. npm i react-scrollspy: ^3.4.3 (deprecated)
4. npm i aos --save : ^2.3.4

##################################################################

## LARAVEL DEPEDENCIES ##
1. 

##################################################################

## ENVIRONMENT CONFIGURATION ##
1. Frontend
> Download visual studio code
> Install node js
> Check with cmd : node -v and npm -v
> Cmd to install react : npx create-react-app my-app

2. Backend
> composer create-project laravel/laravel <project-name> --ignore-platform-reqs (if need, ignore to resolve conflict)
> run php artisan serve to check
> For laravel/breeze run : composer require laravel/breeze --dev --ignore-platform-reqs (if need, ignore to resolve conflict)
> For laravel/breeze run : then run php artisan breeze:install
> For laravel/breeze run : check browser and see got login option laravel
> configure dockerfile 
> Command : docker-compose up --build -d each time (only need to run this if everything set up in docker)

##################################################################

## HOW TO RUN PROJECT ##
1. cd to project directory, then enter command : npm start (localhost: 3000)


## RUNNING BACKEND
1. 

##################################################################

## REACT SHORTCUT ##
1. type doc + press tabl -> to make boiler plate
2. #id -> this will create div with id, can also section#id
3. rafce -> give react functional component
4. .class -> this will create div with class

##################################################################

## MOBILE CONFIGURATION SPECIAL (React) ##
1. navbar vs floating-nav : nav for web, floating for mobile

##### IMPORTANT #####
1. // eslint-disable-line react-hooks/exhaustive-deps -> used this comment in useEffect to disable warning due to dependency needed to detect change to trigger useEffect

##################################################################

## EXTRA KNOWLEDGES (React) ##
1. devDependencies - are for packages that are consumed by requiring them in files or run as binaries during development phase. So they are not necessary for production
-> run "npm audit --production" to show you do not need those script at production etc