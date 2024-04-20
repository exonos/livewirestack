import { WireModel } from '../../../components/alpine'
import debounce from '../../../utils/debounce'
import { isEmpty } from '../../../utils/helpers'
import throttle from '../../../utils/throttle'
import { Entangleable } from './index'

export default class SupportsLivewire {
  private entangleable: Entangleable

  private wireModel: WireModel

  private livewire: any

  constructor (entangleable: Entangleable, wireModel: WireModel) {
    this.entangleable = entangleable
    this.wireModel = wireModel
    this.livewire = window.Livewire.find(wireModel.livewireId)

    this.init()

    if (isEmpty(this.entangleable.get())) {
      this.fillValueFromLivewire()
    }
  }

  private init () {
    this.livewire.watch(this.wireModel.name, (value: any) => {
      this.entangleable.set(value)
    })

    const IN_LIVE = true

    const modifiers = this.wireModel.modifiers

    const hasModifiers = modifiers.blur || modifiers.debounce.exists || modifiers.throttle.exists

    if (!hasModifiers) {
      this.entangleable.watch((value: any) => {
        this.set(value, this.wireModel.modifiers.live)
      })
    }

    if (modifiers.blur) {
      this.entangleable.onBlur((value: any) => this.set(value, IN_LIVE))
    }

    if (modifiers.debounce.exists) {
      this.entangleable.watch(debounce(
        (value: any) => this.set(value, IN_LIVE),
        modifiers.debounce.delay
      ))
    }

    if (modifiers.throttle.exists) {
      this.entangleable.watch(throttle(
        (value: any) => this.set(value, IN_LIVE),
        modifiers.throttle.delay
      ))
    }
  }

  set (value: any, isLive: boolean) {
    if (this.livewire.get(this.wireModel.name) === value) return

    this.livewire.set(this.wireModel.name, value, isLive)
  }

  private fillValueFromLivewire () {
    const value = this.livewire.get(this.wireModel.name)

    if (isEmpty(value)) return

    this.entangleable.set(value)
  }
}
