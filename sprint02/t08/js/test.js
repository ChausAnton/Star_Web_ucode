const expect = mocha.chai.expect

expect(checkBrackets(undefined)).to.equal(-1)
expect(checkBrackets(null)).to.equal(-1)
expect(checkBrackets(NaN)).to.equal(-1)
expect(checkBrackets(42)).to.equal(-1)
expect(checkBrackets(42n)).to.equal(-1)
expect(checkBrackets(true)).to.equal(-1)
expect(checkBrackets('empty')).to.equal(-1)
expect(checkBrackets(')')).to.equal(1)
expect(checkBrackets('))()')).to.equal(2)
expect(checkBrackets('1)()(())2(()')).to.equal(2)

expect(checkBrackets('((2)))4)(())5)')).to.not.equal(2)
expect(checkBrackets('((1)((6)())')).to.not.equal(2)
expect(checkBrackets('1)())())(())2(()7)')).to.not.equal(2)
expect(checkBrackets('((()())))(4))7(((8))')).to.not.equal(2)
expect(checkBrackets('()((8((6)((7)(3))))')).to.not.equal(2)