__construct: Cette méthode est appelée automatiquement lors de l'instanciation d'un objet. Elle est utilisée pour initialiser les propriétés de l'objet. Par exemple :

class MyClass {
    public function __construct() {
        echo "L'objet a été instancié.";
    }
}

$obj = new MyClass(); // Affiche "L'objet a été instancié."


__toString: Cette méthode est appelée lorsque vous essayez de convertir un objet en chaîne de caractères (par exemple, lors de l'utilisation de echo ou de print). Elle permet de définir le comportement de conversion de l'objet en chaîne. Par exemple :

class MyClass {
    public function __toString() {
        return "Ceci est une représentation sous forme de chaîne de l'objet.";
    }
}

$obj = new MyClass();
echo $obj; // Affiche "Ceci est une représentation sous forme de chaîne de l'objet."


__get: Cette méthode est appelée lorsqu'on tente d'accéder à une propriété inexistante ou inaccessible d'un objet. Elle permet de définir un comportement personnalisé pour la lecture de propriétés. Par exemple :

class MyClass {
    private $data = ['foo' => 'bar'];

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            return null;
        }
    }
}

$obj = new MyClass();
echo $obj->foo; // Affiche "bar"
echo $obj->baz; // Affiche ""

__set: Cette méthode est appelée lorsqu'on tente d'assigner une valeur à une propriété inexistante ou inaccessible d'un objet. Elle permet de définir un comportement personnalisé pour l'assignation de propriétés. Par exemple :

class MyClass {
    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$obj = new MyClass();
$obj->foo = "bar";
echo $obj->foo; // Affiche "bar"


__call: Cette méthode est appelée lorsqu'on tente d'appeler une méthode inexistante ou inaccessible d'un objet. Elle permet de définir un comportement personnalisé pour l'appel de méthodes. Par exemple :

class MyClass {
    public function __call($name, $arguments) {
        echo "La méthode $name a été appelée avec les arguments : " . implode(', ', $arguments);
    }
}

$obj = new MyClass();
$obj->myMethod('arg1', 'arg2'); // Affiche "La méthode myMethod a été appelée avec les arguments : arg1, arg2"

