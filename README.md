
#  Widget Carto_HAL Drupal 8 #

Widget pour Drupal 8.X permettant de cartographier les pays publiant dans une collection HAL.


Le Widget s'installe de cette manière:

	git clone git@bitbucket.org:arnouldpy/carto_hal-drupal.git
Rendez vous ensuite sur la branche Carto_hal_drupal_8

## Deploiement: ##

Executez cette commande:

	zip -r Widget_carto_hal.zip  * 

Uploader le Zip génèrer dans le backend de drupal:

Rendez vous dans Extend, Install new module et uploadez le fichier .zip

Une fois cela fait, Activez le plugin dans la list, ensuite rendez vous a cette adresse:

/admin/config/carto_hal/config

Afin de configurer le widget.

Ensuite rendez vous dans structure , Block layout et selectionnez un block ou le widget doit apparaitre, place block et choississez carto_hal

