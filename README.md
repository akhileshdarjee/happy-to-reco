# Happy to Reco

Happy to Reco is written on PHP with Laravel as framework and has MySQL database.
Frontend is built up on using Bootstrap.
On top of Laravel we've used [Origin CMS](https://github.com/akhileshdarjee/origin-cms)

[http://139.59.36.64:8097] (Happy to Reco)

---

### Intro

Even in the age of internet - we still ask our friends and family if we need recommendations for people.
Like if you want a driver for your parents - you will not Google but ask your friends if they know a good driver.
If you need a dentist, you will do the same.

This portal aims to help people find trustworthy recommendations.
Make your profile
Add the recommendations - people whom you trust.
Ask for recommendations - put what you are looking for and others in the community will help you out.

Currently, we are restricting to some types of services.
Once connected with Facebook friends, this will be a goto place if people want local services.

---

### Installation

1. `git clone -b master --single-branch https://github.com/akhileshdarjee/happy-to-reco.git`
2. Now firstly change git origin url to your app git repo url as later you might end in getting git push errors
3. `cd happy-to-reco`
4. `composer install`
5. Create '.env' file inside your project, copy `.env.example` to `.env`
6. `php artisan key:generate`
7. (Optional) Naming your app - `php artisan app:name {YOUR_APP_NAME}`
8. Now create MySQL database for your Laravel app and include it's config in '.env' file
9. `php artisan migrate:refresh --seed`


**Permissions**

`sudo chown -R :www-data {app-directory-path}`  
`sudo chmod -R ug+rw {app-directory-path}/app/storage`

  
Now, you've completed the configuration step :v:

10. Serve it on your local server, `php artisan serve --port=8081`
  
11. Hit this URL: http://localhost:8081/login
  
### Login Credentials

**Login ID**: admin
**Password**: admin@111


Enjoy...!!! :thumbsup:

---

This project was originally coded at Mumbai Hackathon 2017.
Hope it helps opensource developers to explore more into the code or maintain similar portals for some different purposes.