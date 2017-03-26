# Happy to Reco

Happy to Reco is written on PHP with Laravel as framework and has MySQL database.
Frontend is built up on using Bootstrap.
On top of Laravel we've used [Origin CMS](https://github.com/akhileshdarjee/origin-cms)

[http://139.59.36.64:8097](Happy to Reco)

---

### Intro

This portal has a simple aim -
To make it easy for fans to be informed about their favourite live (music) gigs.

After signing up, users have option to follow 
- Artists
- Venues (Where live gigs happen)
- Genre (A particular type of music)

Users will be shown upcoming gigs
- Of the artist they have followed (any venue)
- Of the venue they have followed (any artist, any genre)
- Of the genre they have followed (any artist, any venue)

The data of the Artist, venue and genre is maintained through the backend.

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

### Screenshots

![Home Page]
(http://gigalert.in/img/gig_alert.png)

![All Gigs]
(http://gigalert.in/img/gigs.png)

![Discover]
(http://gigalert.in/img/discover.png)

---

This project was originally coded at Mumbai Hackathon 2017.
Hope it helps opensource developers to explore more into the code or maintain similar portals for some different purposes.