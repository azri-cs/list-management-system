export const localStorageService = {
    getItems() {
        return JSON.parse(localStorage.getItem('items')) || [];
    },

    setItems(items) {
        localStorage.setItem('items', JSON.stringify(items));
    },

    getListings() {
        return JSON.parse(localStorage.getItem('listings')) || [];
    },

    setListings(listings) {
        localStorage.setItem('listings', JSON.stringify(listings));
    },

    addItem(item) {
        const items = this.getItems();
        item.id = Date.now();
        items.push(item);
        this.setItems(items);
        return item;
    },

    updateItem(item) {
        const items = this.getItems();
        const index = items.findIndex(i => i.id === item.id);
        if (index !== -1) {
            items[index] = item;
            this.setItems(items);
        }
    },

    deleteItem(id) {
        const items = this.getItems();
        const newItems = items.filter(item => item.id !== id);
        this.setItems(newItems);
    },

    addListing(listing) {
        const listings = this.getListings();
        listing.id = Date.now();
        listings.push(listing);
        this.setListings(listings);
        return listing;
    },

    updateListing(listing) {
        const listings = this.getListings();
        const index = listings.findIndex(l => l.id === listing.id);
        if (index !== -1) {
            listings[index] = listing;
            this.setListings(listings);
        }
    },

    deleteListing(id) {
        const listings = this.getListings();
        const newListings = listings.filter(listing => listing.id !== id);
        this.setListings(newListings);
    }
};
