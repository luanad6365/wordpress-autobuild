Wordpress-autobuild
===================

Usage
-----

To create the image in local , execute the following command on docker:

	docker build --rm -t="your_image_name"  https://github.com/luanad6365/wordpress-autobuild.git


Running docker image
-----------------------------------

Start your image:

	docker run -d -p 80:80 your_image_name

Test on your browser :

	http://localhost/
