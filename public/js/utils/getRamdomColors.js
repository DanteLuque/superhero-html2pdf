function getRandomColors(count) {
    const bgColors = [];
    const borderColors = [];

    for (let i = 0; i < count; i++) {
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);

        bgColors.push(`rgba(${r}, ${g}, ${b}, 0.2)`);
        borderColors.push(`rgb(${r}, ${g}, ${b})`);
    }

    return {
        bgColors,
        borderColors
    };
}