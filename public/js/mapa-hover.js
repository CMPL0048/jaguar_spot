document.addEventListener('DOMContentLoaded', () => {
    const mapImage = document.querySelector('.interactive-map img');
    const tooltip = document.createElement('div');
    tooltip.classList.add('tooltip');
    document.body.appendChild(tooltip);

    const areas = document.querySelectorAll('area');

    areas.forEach(area => {
        area.addEventListener('mouseenter', (e) => {
            tooltip.textContent = area.title;
            tooltip.style.display = 'block';
        });
        area.addEventListener('mousemove', (e) => {
            tooltip.style.left = (e.pageX + 10) + 'px';
            tooltip.style.top = (e.pageY + 10) + 'px';
        });
        area.addEventListener('mouseleave', () => {
            tooltip.style.display = 'none';
        });
    });
});
