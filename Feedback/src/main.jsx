import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'
import WordScrambleGame from './FUN'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
    <WordScrambleGame/>
  </React.StrictMode>,
)
