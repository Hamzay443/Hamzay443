import React, { useState } from 'react';
import './Funpage.css';

function WordScrambleGame() {
  const correctSentence = ['the', 'engine', 'is', 'important'];
  const [userSentence, setUserSentence] = useState([]);
  const [result, setResult] = useState('');

  const handleDragStart = (event, word) => {
    event.dataTransfer.setData('text', word);
  };

  const handleDrop = (event) => {
    event.preventDefault();
    const word = event.dataTransfer.getData('text');
    setUserSentence([...userSentence, word]);
  };

  const handleDragOver = (event) => {
    event.preventDefault();
  };

  const updateSentenceBox = (word) => {
    setUserSentence(userSentence.filter((w) => w !== word));
  };

  const checkSentence = () => {
    if (userSentence.join(' ') === correctSentence.join(' ')) {
      setResult('Correct! Well done! 🎉');
    } else {
      setResult('Try again! 😊');
    }
  };

  const resetGame = () => {
    setUserSentence([]);
    setResult('');
  };

  return (
    <div className="container">
      <h1>Word Scramble: Knight's Creativity</h1>
      <p>Drag and drop the words to make a full sentence</p>

      <div id="scrambledWords">
        {correctSentence.map((word, index) => (
          <span
            key={index}
            draggable
            onDragStart={(e) => handleDragStart(e, word)}
          >
            {word}
          </span>
        ))}
      </div>

      <div id="sentenceFormation">
        <p>Form a sentence:</p>
        <div
          id="sentenceBox"
          onDragOver={handleDragOver}
          onDrop={handleDrop}
        >
          {userSentence.map((word, index) => (
            <span key={index} onClick={() => updateSentenceBox(word)}>
              {word}
            </span>
          ))}
        </div>
      </div>

      <div className="button-container">
        <button className="btn" onClick={checkSentence}>
          Check Sentence
        </button>
        <button className="btn" onClick={resetGame}>
          Reset Game
        </button>
      </div>

      <p id="result">{result}</p>
    </div>
  );
}

export default WordScrambleGame;