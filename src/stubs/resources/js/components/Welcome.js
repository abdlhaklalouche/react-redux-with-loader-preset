import React, { Component } from 'react'

export default class Welcome extends Component {
  render() {
    return (
      <div>
        <h3>Congrats {this.props.name} is ready!</h3>
      </div>
    )
  }
}
