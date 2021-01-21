# Comment partciper au projet?

## Cloner le projet.
En effet, si vous souhaitez participer au projet vous devez d'abord installer le projet en local sur votre ordinateur, le fichier readme.md à la racine du projet
contient les instructions pour installer le projet.

## Créez les issues dans Github

Les issues correspondent à chaque tâche que vous allez réaliser dans le cadre de l'amélioration du projet, vous devez les créer sur Github, en précisant de préférence ce que
vous allez réaliser au cours de cette tâche, et le temps que vous estimez pour la réaliser.

## Créez une branche pour chaque tâche

Avant de commencer à réaliser une tâche au sein du code, vous devez créer une branche correspondant à celle ci en tapant la commande suivante dans le terminal de votre IDE:

```
git checkout -b [nom_de_la_branche]
```
Bien sûr le nom de la branche doit correspondre au nom de la tâche. Par exemple, si votre tâche consiste à rendre le site responsive, vous pourrez nommer votre 
branche make_responsive par exemple.

## Tests

Vous devez écrire les tests unitaires et fonctionnels via PHPUNIT dans le dossier test, pour les entités les tests doivent être rédigés dans le dossier test/entity, 
et pour les controllers dans le dossier test/controlleur. Une fois les test rédigés vous pouvez vérifier si ils retournent un résultat correct en exécutant la commande :

```
vendor\bin\phpunit --coverage-html web\test-coverage

Pour générer le rapport de couverture du code, lancez la commande suivante : 

```
vendor\bin\phpunit --coverage-html public\test-coverage

```
 Cela va alors générer des fichiers dans le dossier public/test-coverage, dont le fichier index.html qui indique le taux de couverture, si le total de ce dernier est équivalent
 à 7O% le code est suffisamment couvert

## Faites un commit puis un push de votre branche 

Ajoutez et enregistrez les modifications que vous avez apporté sur la branche à laquelle vous avez travaillé, lors du commit indiquez ce que vous avez fait
au sein de cette branche, par exemple si vous avez amélioré le design du site: 

```
git add .
git commit -m "improve_website_design"

```

puis faites un push de cette branche dans le répertoire distant github :

```
git push origin [branch name]

```

## Faites une pull request

Faites une pull request vers le master, si votre code est validé, il sera integré au projet par le gérant de ce dernier.

Standards to apply
Please respect the PSR rule, especially those ones :
*   [PSR-1 : Basic Coding Standard](https://gist.github.com/npotier/d5a13245ad9cd2e92fa9dec19baf0e9a)
*   [PSR-2 : Coding Style Guide](https://gist.github.com/npotier/593b645025173ef8bbb5c59d3fd455fa)
*   [PSR-4 : Autoloader](https://www.php-fig.org/psr/psr-4/)
