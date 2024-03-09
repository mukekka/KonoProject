let label = document.querySelector('label')

label.innerHTML = label.innerText.split('')
    .map((letters, i) => {
        return `<span
            style="transition-delay: ${i * 30}ms;  /*延迟执行*/
            filter: hue-rotate(${i * 10}deg)";      /*颜色旋转修改文本*/
        >
        ${ letters }
        </span>`
    }).join('')