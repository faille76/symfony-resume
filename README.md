# Symfony Resume

This project was created to make your CV online easily.  
Experiences and projects can change up to several times a year, the aim is not to waste time unnecessarily.  
The second goal is to install it easily, without a database.

Check out the result: https://frederic-oddou.pro/

## Installation & customization

### 1- Clone the project

```shell script
git clone https://github.com/faille76/symfony-resume.git
cp .env.example .env
composer install
```


### 2- Update the .env with your needs.

- `GOOGLE_RECAPTCHA3_PUBLIC` and `GOOGLE_RECAPTCHA3_PRIVATE` are necessary in order not to receive emails from robots :)  
Generate your keys: https://www.google.com/recaptcha/admin/create

- `GOOGLE_ANALYTICS_KEY` to get some statistics: https://analytics.google.com/analytics/web/

- `MAILER_URL` is used to configure the mailer, check out how to configure yours: https://symfony.com/doc/current/email.html?utm_source=recordnotfound.com#configuration


### 3- Personalize your experiences, education, projects ...

To personalize your CV, all you need to do is modify the configurations, which you will find here:
```
config/packages/educations.yaml
config/packages/experiences.yaml
config/packages/profile.yaml
config/packages/projects.yaml
config/packages/technos.yaml
```


## Author
- [Frederic Oddou](https://frederic-oddou.pro/)

## License
[MIT](https://choosealicense.com/licenses/mit/)