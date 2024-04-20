## Soporte


### Label
```bash
<x-toggle label="Receive Alert" />

```

### Label Slot
```bash
<x-toggle>
    <x-slot:label>
        I agree to the <a href="#">terms and conditions</a>
    </x-slot:label>
</x-toggle>
```


###  Size Variations
Se aceptan dos variantes de tamano, por default esta activada LG
```bash
<x-toggle md />
<x-toggle lg />
```

###  Color Variations
```bash
<x-toggle color="blue" label="Azul" />
<x-toggle color="red" label="Rojo" />
```

###  label position
```bash
<x-toggle wire:model="state.has_startDate" label="Position" color="green" position="left"/>
```

