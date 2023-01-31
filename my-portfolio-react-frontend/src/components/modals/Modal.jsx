import { Fragment } from 'react';
import Card from './../card/Card';
import ReactDOM from 'react-dom'
import './modal.css'
import { useModalContext } from '../../context/modal-context';

const Modal = (props) => {
  const { showModal, closeModalHandler } = useModalContext();
  return (
    <Fragment>
        {
            showModal && ReactDOM.createPortal(<>
            <section id="backdrop" onClick={closeModalHandler}></section>
            <Card className={props.className}>{props.children}</Card>
            </>, document.querySelector('#overlays'))
        }
    </Fragment> 
  )
}

export default Modal