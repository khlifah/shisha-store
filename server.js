const express = require('express');
const path = require('path');
const app = express();
const port = process.env.PORT || 3000;

// Serve static files
app.use(express.static('.'));

// Health check endpoint for Render
app.get('/health', (req, res) => {
    res.status(200).json({ status: 'OK', message: 'Server is running' });
});

// Handle PHP-like routing
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.php'));
});

app.get('/category.php', (req, res) => {
    res.sendFile(path.join(__dirname, 'category.php'));
});

app.get('/cart.php', (req, res) => {
    res.sendFile(path.join(__dirname, 'cart.php'));
});

// Catch all other routes and serve index.php
app.get('*', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.php'));
});

app.listen(port, '0.0.0.0', () => {
    console.log(`Server running on port ${port}`);
});