# Frontend Boilerplate aka frontenddevkit

A simple boilerplate to start the frontend of projects using webpack, scss and es6. Including linters for scss and js.

## Setting up
```bash
# Install dependencies
npm install

# Run
npm start
```

## Project Structure
```
 ├── dist/                                  # Files for distribution (pubilc)
 │   ├── css/
 │   ├── images/
 │   ├── js/
 │   └── index.html
 ├── js/
 │   └── index.js                           # Base js file
 ├── scss/
 │   ├── base/                              # Top level styles & settings
 │   │   ├── _animations.scss               # Pre-defined animations
 │   │   ├── _base.scss                     # Generic site styles. e.g html, body, *
 │   │   ├── _settings.scss                 # Re-usable variables. e.g colors, breakpoints, drop shadows
 │   │   └── _typography.scss               # Base font styles. Font-families, default font sizes heading styles
 │   ├── components/
 │   │   ├── _modal.scss
 │   │   └── _imports.scss                  # Component import file (should only contain imports)
 │   ├── elements/
 │   │   ├── _button.scss
 │   │   └── _imports.scss                  # Element import file (should only contain imports)
 │   ├── utils/
 │   │   ├── _centered.scss
 │   │   ├── _clearfix.scss
 │   │   ├── _imports.scss                  # Utils import file (should only contain imports)
 │   │   └── _media-queries.scss                  
 │   └── style.scss                         # Main sass file (should only contain imports)
 ├── .eslintrc.js
 ├── .gitignore
 ├── .stylelintrc
 ├── package.json
 ├── readme.md
 └── webpack.config.js
```