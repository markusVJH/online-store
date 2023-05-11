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
            localStorage.setItem('cart', JSON.stringify([{title: item.title, price: item.price}])); 
        } else {
            const filteredStorage = storage.filter(element => element.title === item.title)
            if (filteredStorage.length === 0) {
                storage.push({title: item.title, price: item.price})
                localStorage.setItem('cart', JSON.stringify(storage))
            }
        }
    }
}
