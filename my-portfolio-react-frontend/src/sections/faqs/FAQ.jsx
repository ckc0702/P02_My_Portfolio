import Card from '../../components/card/Card'
import { AiOutlinePlus, AiOutlineMinus } from 'react-icons/ai'
import { useState } from 'react'

const FAQ = (props) => {
    const [showAnswer, setShowAnswer] = useState(false);

  return (
    <Card className="faq" onClick={() => setShowAnswer(state => !state)}>
        <div>
            <h5 className='faq_question'>{props.faq.question}</h5>
            <button className='faq__icon'>
                {showAnswer ? <AiOutlineMinus/> : <AiOutlinePlus/>}
            </button>
        </div>
        {showAnswer && <p className='faq__answer'>{props.faq.answer}</p>}
    </Card>
  )
}

export default FAQ