## Soporte

Este componente acepta la heredacion de propiedades como placeholder, label, name, wire:model, readonly

### normal, debe ser un array, puede ser de una dimension
```bash
<x-select label="select" :options="['one', 'two', 'tree']" name="email" placeholder="test"/>
```

### hint
```bash
<x-select label="email" :options="['one', 'two', 'tree']" hint="Escribe tu email"/>
```

### multidimensional
cuando se usa un select multidimensional se debe definir la propiedad select con el id y label que se usaran para definir el key y value del array
```bash
<x-select label="email" :options="[['id' => 1, 'value' => 'One'], ['id' => 2, 'value' => 'Two'], ['id' => 3, 'value' => 'Tree']]" hint="Escribe tu email" select="id:id|label:label"/>
```

### multiselect
```bash
<x-select label="email" multiselect :options="['one', 'two', 'tree']" hint="Escribe tu email"/>
```

### searcheable
```bash
<x-select searchable label="email" :options="['one', 'two', 'tree']" hint="Escribe tu email"/>
```

### Label Slot
```bash
<x-select label="email" :options="['one', 'two', 'tree']" hint="Escribe tu email">
    <x-slot:label>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:label>
</x-select>
```

### prepend Slot
```bash
<x-select label="email" :options="['one', 'two', 'tree']" />
    <x-slot:prepend>
      <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Default</span>
    </x-slot:prepend>
</x-select>
```

### append Slot
```bash
<x-select label="email" :options="['one', 'two', 'tree']">
    <x-slot:append>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:append>
</x-select>
```

###  Size Variations
Se aceptan dos variantes de tamano, por default esta activada LG
```bash
<x-select label="email" :options="['one', 'two', 'tree']" width="sm" />
<x-select label="email" :options="['one', 'two', 'tree']" width="md" />
<x-select label="email" :options="['one', 'two', 'tree']" width="lg" />
```

###  readonly property only apply to main input, if you need readonly on suffix, prefix, append or prepend slot need to add a class named pointer-events-none
```bash
<x-select readonly label="select" :options="['one', 'two', 'tree']" name="email" placeholder="test"/>
```