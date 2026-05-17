import './bootstrap';


window.counter = function(target, speed = 40) {
    return {
        count: 0,
        target: target,
        started: false,
        init() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !this.started) {
                        this.started = true
                        let interval = setInterval(() => {
                            if (this.count < this.target) {
                                this.count++
                            } else {
                                clearInterval(interval)
                            }
                        }, speed)
                    }
                })
            }, {
                threshold: 0.5
            })
            observer.observe(this.$el)
        }
    }
}