#!/bin/bash

bash -c "npm run dev" &
bash -c "php artisan serve" &

wait