# 🧾 Invoice Management App

A modern web application for creating and managing invoices, built with **Laravel** (backend) and **Vue.js** (frontend).

## ✨ Features

- **Customer Management:** Select customers from a dynamic dropdown.
- **Product Catalog:** Add products to invoices with a modal picker.
- **Cart System:** Adjust quantities, prices, and remove items in real time.
- **Invoice Details:** Set invoice number, reference, dates, and terms.
- **Live Calculations:** Automatic subtotal, discount, and grand total updates.
- **Form Validation:** Prevents saving empty invoices.
- **Responsive UI:** Clean, user-friendly interface.


## 🖥️ Tech Stack

- **Backend:** Laravel (REST API)
- **Frontend:** Vue 3 (Composition API)
- **Styling:** Custom CSS

## 📦 Key Code Example

```vue
// Add items to invoice cart and calculate totals
const addCart = (item) => {
    const itemCart = {
        id: item.id,
        item_code: item.item_code,
        description: item.description,
        unit_price: item.unit_price,
        quantity: 1,
    };
    listCart.value.push(itemCart);
};

const subTotal = () => {
    return listCart.value.reduce((total, item) => total + item.quantity * item.unit_price, 0);
};

const grandTotal = () => subTotal() - form.value.discount;
```

## 📋 How It Works

1. **Select a Customer:** Choose from a list of customers.
2. **Add Products:** Click "Add New Line" to open the product modal and add items.
3. **Edit Cart:** Adjust quantities or remove items as needed.
4. **Set Invoice Details:** Fill in dates, number, reference, and terms.
5. **Review Totals:** Subtotal, discount, and grand total update automatically.
6. **Save Invoice:** Submit the form to save the invoice via the API.

## 🛠️ Setup

1. Clone the repo and install dependencies:
    ```sh
    composer install
    npm install
    ```
2. Configure your `.env` and database.
3. Run migrations and seeders:
    ```sh
    php artisan migrate --seed
    ```
4. Start the dev servers:
    ```sh
    php artisan serve
    npm run dev
    ```

## 📄 License

MIT
