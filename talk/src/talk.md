# Des conseils pour bien architecturer

# Je suis

- développeur senior freelance depuis 8 ans (principalement PHP)
- co-fondateur et président des conférences [Sud Web](http://sudweb.fr)
- co-fondateur éditeur [Le train de 13h37](http://letrainde13h37.fr)
- co-organisateur du meetup [Web en Vert](http://webenvert.fr)

# Me contacter

- email : loic@mathaud.fr
- twitter : @loicmathaud
- IRC (freenode) : loicm

# Petite Histoire

Il était une fois une startup…

- Problématiques variées et intéressantes
- Poste de Lead Dev

# Comment se déroule-t'elle, en vrai ?

- Course à la fonctionnalité
- Délais très courts

# Résultat

- application monolitique
- dette technique

# Mais…

ÇA MARCHE !

# Et puis…

d'autres développeurs se joignent à l'équipe

# Les problèmes émergent 1/3

Difficulté à comprendre l'ensemble de l'application

# Les problèmes émergent 2/3

Risque de péter quelque chose par effet de bord, sans le savoir (pas de tests)

# Les problèmes émergent 3/3

Performances raisonnables mais pas exceptionnelles

# Résultat

- fustration de l'équipe
- ralentissement du rythme des releases
- pertes de confiances

# Un exemple de (bad) code

```bash
atom ./step-1/
```

# Améliorons un peu les choses

Ajoutons un peu d'objets là-dedans

```bash
atom ./step-2/
```

# Continuons l'amélioration

Gestion d'évènements

# Avantages au découplage

Plus facile :

- à lire
- à maintenir
- à tester
- à comprendre
- de faire entrer une nouvelle personne dans le projet

# Avec du code

```bash
atom ./step-3/
```
# Inconvénients

- On reste dans du procédural
- Rien n'est fait en asynchrone

# Dernière étape

Job queue et Workers

# Avantages

- Performances++ (on rend la main plus rapidement à l'utilisateur)
- Déporter le code
- Gérer la charge
- Mixer les technologies
- Ajout features facilité

# Avec du code

```bash
atom ./step-4/
```

# The End

Ils travaillèrent heureux et eurent beaucoup… moins de bugs