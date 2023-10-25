
# LinkBio *WIP*

LinkBio is a simple application that allows users to **create their own page** that will contain **links that are important to them** and which **they can share with the rest of the world**.

## Functions

- [x] Authentication
- [x] View user page
- [x] Add links to profile
- [x] Edit profile
- [x] Customize page with custom css
- [ ] Customize page with style selection
- [x] Link tracking (simple)
- [ ] Complex Link tracking (complex)
- [ ] Admin panel

## Screenshots

![Homepage](https://i.imgur.com/JBlqHjQ.png)

![Login](https://i.imgur.com/YHGh4Vi.png)

![Register](https://i.imgur.com/SrmTPBs.png)

![User page](https://i.imgur.com/Y849bre.png)

![User dashboard](https://i.imgur.com/RaJgadJ.png)

![User profile edit](https://i.imgur.com/XFrO7W5.png)

![User page custom css](https://i.imgur.com/E4fkWzD.png)

## Installation

    git clone https://github.com/daffyyyy/linkbio.git
    composer install or composer update
    cp .env.example .env
    __Setup .env file__
    php artisan key:generate
    php artisan storage:link
    php artisan migrate:fresh
    php artisan serve
