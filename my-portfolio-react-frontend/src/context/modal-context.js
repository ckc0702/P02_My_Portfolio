import { createContext, useContext, useState } from "react";

const ModalContext = createContext();

export const  ModalProvider = (props) => {
    const [showModal, setShowModal]  = useState(false);

    const showModalHandler = () => {
        setShowModal(true);
    }

    const closeModalHandler = () => {
        setShowModal(false);
    }

    return <ModalContext.Provider value={{showModal, showModalHandler, closeModalHandler}}
    >{props.children}</ModalContext.Provider>
}

// custom hook to consume modal context 
export const useModalContext = () => {
    return useContext(ModalContext);
}