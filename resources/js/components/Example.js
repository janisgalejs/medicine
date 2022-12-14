import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="logo"><b>r<span>e</span>act</b></div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example/>, document.getElementById('example'));
}
