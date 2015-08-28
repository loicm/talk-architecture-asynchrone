# Des conseils pour bien architecturer

# Je suis

- développeur senior
- co-fondateur de l'agence Web [Kayuko](http://kayuko.com) (principalement PHP)
- co-fondateur et président des conférences [Sud Web](http://sudweb.fr)
- co-fondateur éditeur [Le train de 13h37](http://letrainde13h37.fr)
- co-organisateur du meetup [Web en Vert](http://webenvert.fr)

# Me contacter

- email : loic@mathaud.fr
- http://loic.mathaud.fr
- twitter : @loicmathaud
- IRC (freenode) : loic_m

# Petite Histoire

Il était une fois une startup…

- Problématiques variées et intéressantes
- Poste de Lead Dev (oui, j'étais tout seul au début ^^)

# Comment se déroule-t'elle, en vrai ?

- Course à la fonctionnalité
- Délais très courts

# Résultat

- Application monolitique
- Dette technique

# Mais…

ÇA MARCHE !

# Et puis…

D'autres développeurs se joignent à l'équipe

# Les problèmes émergent 1/3

Difficultés à comprendre l'ensemble de l'application

# Les problèmes émergent 2/3

Risques de casser quelque chose par effet de bord, sans le savoir (pas de tests)

# Les problèmes émergent 3/3

Performances raisonnables mais pas exceptionnelles

# Résultats

- Fustrations dans les équipes
- Ralentissement du rythme des releases
- Pertes de confiances

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

Ajoutons une gestion d'évènements et découplons

# Avantages du découplage

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
- Ajout de fonctionnalités facilité

# Avec du code

```bash
atom ./step-4/
```

# Morale

- Single Responsability Principle
- Tâches asynchrones

# The End

Ils travaillèrent heureux et eurent beaucoup… moins de bugs

