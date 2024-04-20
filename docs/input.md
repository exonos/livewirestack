## Input component
El componente de entrada ofrece un alto grado de flexibilidad y personalización. Los usuarios pueden agregar fácilmente etiquetas y descripciones a la entrada, y tienen la opción de incluir íconos en los lados izquierdo y derecho para elementos visuales adicionales. Además, el componente admite prefijos y sufijos para personalizar aún más el contenido de la entrada. Para aquellos que buscan una personalización aún mayor, las ranuras para anteponer y agregar brindan amplias opciones para diseñar la entrada para satisfacer sus necesidades y preferencias específicas.

El componente de input ofrece la posibilidad de customizacion sencilla con unas cuantas lineas de codigo y opciones de facil configuracion, se pueden agregar facilmente hints, labels, slots, tiene renderizacion de mensajes de error integrados y mucho mas.

### normal
```bash
<x-input label="Receive Alert" name="email"/>
```

### hint
```bash
<x-input label="email" hint="Escribe tu email"/>
```

### Label Slot
```bash
<x-input>
    <x-slot:label>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:label>
</x-input>
```


### prepend Slot
```bash
<x-input>
    <x-slot:prepend>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:prepend>
</x-input>
```

### input type, default text
```bash
<x-input type="text"/>
```

### append Slot
```bash
<x-input>
    <x-slot:append>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:append>
</x-input>
```

### prefix Slot
```bash
<x-input>
    <x-slot:prefix>
      <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Extra small</button>
    </x-slot:prefix>
</x-input>
```

### suffix Slot
```bash
<x-input>
    <x-slot:suffix>
         <select id="countries" class="bg-transparent border-transparent w-48 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-0 outline-none block p-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
           <option selected>Choose a country</option>
           <option value="US">United States</option>
           <option value="CA">Canada</option>
           <option value="FR">France</option>
           <option value="DE">Germany</option>
         </select>
    </x-slot:suffix>
</x-input>
```

###  Size Variations
Se aceptan dos variantes de tamano, por default esta activada LG
```bash
<x-input width="sm" />
<x-input width="md" />
<x-input width="lg" />
```

###  readonly property only apply to main input, if you need readonly on suffix, prefix, append or prepend slot need to add a class named pointer-events-none
```bash
<x-input color="blue" readonly/>
```

