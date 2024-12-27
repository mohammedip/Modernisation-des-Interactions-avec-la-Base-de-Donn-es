# Modernisation-des-Interactions-avec-la-Base-de-Donn-es

## Objectif de la POO

- **Définition** : La Programmation Orientée Objet (POO) est une méthode de programmation qui permet de modéliser des entités du monde réel sous forme d'objets, instances de classes. Elle permet d'organiser et de structurer le code de manière logique et modulaire.
  
- **Avantages** :
  - **Réutilisabilité** : Le code peut être réutilisé dans différentes parties du projet ou même dans d'autres projets.
  - **Scalabilité** : La POO facilite l'ajout de nouvelles fonctionnalités ou composants sans affecter le code existant.
  - **Maintenabilité** : Grâce à l'organisation en classes et objets, la maintenance du code devient plus facile, car la logique est plus modulaire.

---

## Classes et Objets

### 1. **Définir une classe et créer un objet**
   - Une **classe** est un modèle de création d'objets. Un **objet** est une instance d'une classe.

   - **Syntaxe** :
     ```php
     class Personne {
         public $nom;
         public $age;

         public function __construct($nom, $age) {
             $this->nom = $nom;
             $this->age = $age;
         }
     }

     $personne1 = new Personne("Alice", 30);  // Création d'un objet
     echo $personne1->nom;  // Alice
     ```

### 2. **Propriétés et Méthodes**
   - Les **propriétés** sont les attributs ou variables d'une classe.
   - Les **méthodes** sont les fonctions qui définissent les comportements de la classe.

   - **Exemple** :
     ```php
     class Voiture {
         public $couleur;

         public function setCouleur($couleur) {
             $this->couleur = $couleur;
         }

         public function getCouleur() {
             return $this->couleur;
         }
     }

     $voiture = new Voiture();
     $voiture->setCouleur("Rouge");
     echo $voiture->getCouleur();  // Rouge
     ```

### 3. **Constructeurs et Destructeurs**
   - Les **constructeurs** sont des méthodes spéciales appelées automatiquement lors de l'instanciation d'un objet. Ils sont utilisés pour initialiser les propriétés d'un objet.
   - Les **destructeurs** sont appelés lorsqu'un objet est détruit et permettent de nettoyer les ressources utilisées par l'objet.

   - **Exemple** :
     ```php
     class Voiture {
         public $marque;

         public function __construct($marque) {
             $this->marque = $marque;
         }

         public function __destruct() {
             echo "La voiture " . $this->marque . " a été détruite.";
         }
     }

     $voiture = new Voiture("Toyota");
     unset($voiture);  // La voiture Toyota a été détruite.
     ```

### 4. **Modificateurs d'accès**
   - **Public** : Accessible de partout.
   - **Privé** : Accessible uniquement au sein de la classe.
   - **Protégé** : Accessible au sein de la classe et de ses sous-classes.

   - **Exemple** :
     ```php
     class Personne {
         private $nom;
         protected $age;
         public $sexe;

         public function __construct($nom, $age, $sexe) {
             $this->nom = $nom;
             $this->age = $age;
             $this->sexe = $sexe;
         }
     }
     ```

---

## Concepts de base de la POO

### 1. **Encapsulation**
   - **Définition** : L'encapsulation consiste à regrouper les données (attributs) et les méthodes (fonctions) qui opèrent sur ces données au sein d'une même unité (classe) et à restreindre l'accès direct à certaines parties de la classe. Cela protège l'état interne de l'objet et le rend plus sécurisé.
   - **Avantages** : Limite l'accès aux propriétés et méthodes de l'objet et empêche la modification non contrôlée de ses données internes.

   - **Exemple** :
     ```php
     class Personne {
         private $nom;  // propriété privée

         public function setNom($nom) {  // méthode setter
             $this->nom = $nom;
         }

         public function getNom() {  // méthode getter
             return $this->nom;
         }
     }

     $personne = new Personne();
     $personne->setNom("John");
     echo $personne->getNom();  // John
     ```

### 2. **Abstraction**
   - **Définition** : L'abstraction consiste à masquer les détails complexes de l'implémentation d'une classe et à ne montrer que les fonctionnalités essentielles. Elle simplifie l'interface pour l'utilisateur de la classe.
   - **Avantages** : Aide à gérer la complexité en cachant les parties non essentielles de la classe, rendant le code plus facile à utiliser et à étendre.

   - **Exemple** :
     ```php
     abstract class Animal {
         abstract public function faireDuBruit();
     }

     class Chien extends Animal {
         public function faireDuBruit() {
             echo "Woof!";
         }
     }

     $chien = new Chien();
     $chien->faireDuBruit();  // Woof!
     ```

### 3. **Héritage**
   - **Définition** : L'héritage permet à une classe enfant d'hériter des propriétés et des méthodes d'une classe parent. Cela favorise la réutilisation du code et la création d'une hiérarchie de classes.
   - **Avantages** : Réutilisation des fonctionnalités existantes et réduction de la duplication du code.

   - **Exemple** :
     ```php
     class Animal {
         public $nom;

         public function __construct($nom) {
             $this->nom = $nom;
         }

         public function parler() {
             echo "Je suis un animal.";
         }
     }

     class Chien extends Animal {
         public function parler() {
             echo "Woof! Je suis un chien.";
         }
     }

     $chien = new Chien("Buddy");
     $chien->parler();  // Woof! Je suis un chien.
     ```

### 4. **Polymorphisme**
   - **Définition** : Le polymorphisme permet à une méthode d’avoir un comportement différent en fonction de l’objet qui l'appelle. Cela signifie "beaucoup de formes", permettant à une méthode d'être utilisée de différentes manières selon les objets.
   - **Avantages** : Permet une interface unifiée pour différents types de données, améliorant la flexibilité et la réutilisabilité du code.

   - **Exemple** :
     ```php
     class Animal {
         public function parler() {
             echo "Je suis un animal.";
         }
     }

     class Chien extends Animal {
         public function parler() {
             echo "Woof!";
         }
     }

     class Chat extends Animal {
         public function parler() {
             echo "Miaou!";
         }
     }

     $animal = new Animal();
     $chien = new Chien();
     $chat = new Chat();

     $animal->parler();  // Je suis un animal.
     $chien->parler();   // Woof!
     $chat->parler();    // Miaou!
     ```

---


## Concepts avancés de la POO

### 1. **Classes Abstraites**
   - Les **classes abstraites** servent de modèle aux autres classes. Elles ne peuvent pas être instanciées et peuvent contenir des méthodes abstraites qui doivent être implémentées dans les classes enfants.
   
   - **Exemple** :
     ```php
     abstract class Animal {
         abstract public function faireDuBruit();
     }

     class Chien extends Animal {
         public function faireDuBruit() {
             echo "Woof!";
         }
     }
     ```

### 2. **Interfaces**
   - Les **interfaces** définissent un contrat que les classes doivent suivre, spécifiant quelles méthodes doivent être implémentées, sans fournir l'implémentation de ces méthodes.
   - Une classe peut implémenter plusieurs interfaces.

   - **Exemple** :
     ```php
     interface Animal {
         public function faireDuBruit();
     }

     class Chien implements Animal {
         public function faireDuBruit() {
             echo "Woof!";
         }
     }
     ```

### 3. **Méthodes et Propriétés Statique**
   - Les **méthodes et propriétés statiques** sont liées à la classe elle-même, pas à ses instances. Elles peuvent être appelées directement depuis la classe sans créer d'objet.

   - **Exemple** :
     ```php
     class Math {
         public static $pi = 3.14159;

         public static function calculerAire($rayon) {
             return self::$pi * $rayon * $rayon;
         }
     }

     echo Math::calculerAire(5);  // 78.53975
     ```

### 4. **namespace et Autoloading**
   - Les **espaces de noms** (namespaces) sont utilisés pour organiser le code et éviter les conflits de noms entre les classes.
   - **Autoloading** permet de charger automatiquement les classes lorsque cela est nécessaire, sans avoir à les inclure manuellement.

   - **Exemple** :
     ```php
     namespace MonApp;

     class Voiture {
         public $modele;
     }

     $voiture = new Voiture();

## Interfaces et Traits

### Interfaces

Une interface définit un contrat que les classes doivent respecter en implémentant toutes les méthodes définies dans l'interface.

### Exemple :

```php
interface Volant {
    public function voler();
}

class Avion implements Volant {
    public function voler() {
        return "Je vole dans le ciel.";
    }
}
```

### Traits

Les traits permettent de partager des fonctionnalités entre plusieurs classes sans héritage multiple.

### Exemple :

```php
trait Salut {
    public function direBonjour() {
        return "Bonjour!";
    }
}

class Utilisateur {
    use Salut;
}

$utilisateur = new Utilisateur();
echo $utilisateur->direBonjour();
```

---

## Méthodes Magiques

### Définition

Les méthodes magiques sont des méthodes spéciales en PHP qui commencent par `__`. Elles sont appelées automatiquement dans des contextes spécifiques.

### Principales Méthodes :

- `__construct` : Initialise un objet lors de sa création.
- `__destruct` : Libère les ressources utilisées par un objet lorsqu'il est détruit.
- `__get` et `__set` : Permettent d'accéder et de modifier dynamiquement des propriétés privées.

### Exemple :

```php
class Magique {
    private $data = [];

    public function __get($nom) {
        return $this->data[$nom] ?? null;
    }

    public function __set($nom, $valeur) {
        $this->data[$nom] = $valeur;
    }
}

$obj = new Magique();
$obj->nom = "PHP";
echo $obj->nom;  // PHP
```

---

## Gestion des Erreurs et Exceptions

### Gestion des Exceptions

Les exceptions permettent de gérer les erreurs de manière élégante et contrôlée en utilisant `try`, `catch`, et `throw`.

### Exemple :

```php
try {
    throw new Exception("Une erreur est survenue.");
} catch (Exception $e) {
    echo $e->getMessage();
}
```

---

## Principes SOLID

### Définitions des Principes :

1. **Single Responsibility Principle (SRP)** : Une classe doit avoir une seule responsabilité.
2. **Open/Closed Principle (OCP)** : Une classe doit être ouverte à l'extension mais fermée à la modification.
3. **Liskov Substitution Principle (LSP)** : Les objets d'une classe dérivée doivent pouvoir remplacer ceux de la classe de base sans altérer le comportement du programme.
4. **Interface Segregation Principle (ISP)** : Une classe ne doit pas être forcée d'implémenter des interfaces qu'elle n'utilise pas.
5. **Dependency Inversion Principle (DIP)** : Les modules de haut niveau ne doivent pas dépendre des modules de bas niveau. Tous deux doivent dépendre d'abstractions.

### Exemple :

```php
interface Notification {
    public function envoyer($message);
}

class EmailNotification implements Notification {
    public function envoyer($message) {
        echo "Email : $message";
    }
}

class Application {
    private $notification;

    public function __construct(Notification $notification) {
        $this->notification = $notification;
    }

    public function notifier($message) {
        $this->notification->envoyer($message);
    }
}

$app = new Application(new EmailNotification());
$app->notifier("Bonjour SOLID!");
```

   

