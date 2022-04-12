FROM nginx:latest

RUN apt-get update --fix-missing \
    && apt-get install -y \
        apt-utils \
        curl \
        mc \
        locales

COPY ./default.conf /etc/nginx/conf.d/default.conf
