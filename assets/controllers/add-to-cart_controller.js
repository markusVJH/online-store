import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static values = {
        infoUrl: Object
    }
    add(event) {
        event.preventDefault()
        let storage = JSON.parse(localStorage.getItem('cart'))
        const item = this.infoUrlValue
        if (!storage) {
            localStorage.setItem('cart', JSON.stringify([{id: item.id, title: item.title, price: item.price}])); 
        } else {
            const filteredStorage = storage.filter(element => element.title === item.title)
            if (filteredStorage.length === 0) {
                storage.push({id: item.id, title: item.title, price: item.price})
                localStorage.setItem('cart', JSON.stringify(storage))
            }
        }
    }

    redirect() {
        let cartUrl = '/cart'
        const cartData = JSON.parse(localStorage.getItem('cart'))
        if (cartData && cartData.length > 0) {
          const ids = cartData.map(item => item.id)
          cartUrl = `/cart?data=${ids.join(',')}`
        }
        window.location.href = cartUrl
      }
}
