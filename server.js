const express = require('express');
const path = require('path');
const fs = require('fs');
const app = express();
const port = process.env.PORT || 3000;

// Serve static files (CSS, images, etc.)
app.use('/assets', express.static('assets'));
app.use('/صور المنتجات', express.static('صور المنتجات'));

// Health check endpoint for Render
app.get('/health', (req, res) => {
    res.status(200).json({ status: 'OK', message: 'Server is running' });
});

// Function to serve PHP files as HTML
function servePHPAsHTML(filePath, res) {
    if (fs.existsSync(filePath)) {
        const content = fs.readFileSync(filePath, 'utf8');
        res.setHeader('Content-Type', 'text/html; charset=utf-8');
        res.send(content);
    } else {
        res.status(404).send('File not found');
    }
}

// Handle PHP-like routing
app.get('/', (req, res) => {
    servePHPAsHTML(path.join(__dirname, 'index.php'), res);
});

app.get('/index.php', (req, res) => {
    servePHPAsHTML(path.join(__dirname, 'index.php'), res);
});

app.get('/category.php', (req, res) => {
    servePHPAsHTML(path.join(__dirname, 'category.php'), res);
});

app.get('/cart.php', (req, res) => {
    servePHPAsHTML(path.join(__dirname, 'cart.php'), res);
});

// Catch all other routes and serve index.php
app.get('*', (req, res) => {
    servePHPAsHTML(path.join(__dirname, 'index.php'), res);
});

app.listen(port, '0.0.0.0', () => {
    console.log(`Server running on port ${port}`);
});
