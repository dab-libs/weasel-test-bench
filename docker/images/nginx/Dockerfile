FROM nginx:1.19.6

COPY nginx.conf /etc/nginx/

COPY weasel.conf /etc/nginx/conf.d/
COPY swagger.conf /etc/nginx/conf.d/

COPY ./cors/cors.conf /etc/nginx/cors/
COPY weasel_locations.conf /etc/nginx/

ARG WEASEL_FASTCGI_PASS
RUN envsubst '${WEASEL_FASTCGI_PASS}' < /etc/nginx/weasel_locations.conf  > /etc/nginx/weasel_locations_new.conf && mv /etc/nginx/weasel_locations_new.conf /etc/nginx/weasel_locations.conf

RUN echo "upstream php-upstream { server weasel-php:9001; }" > /etc/nginx/conf.d/upstream.conf

CMD ["nginx"]

EXPOSE 80
EXPOSE 443
